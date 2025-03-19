<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Brand;
use App\Models\Gender;
use App\Models\Product;
use App\Models\Category;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use PHPUnit\TextUI\Configuration\Php;

class ProductController extends Controller
{
    public function index()
    {
        return view('products.index', [
            'products' => Product::all(),
            'tags' => Tag::all(),
        ]);
    }
    public function show(Request $request, Product $product)
    {
        $products = Product::query();

        // Filter by Gender
        if ($request->has('genders')) {
            $products->whereIn('gender_id', $request->genders);
        }

        // Filter by Category
        if ($request->has('categories')) {
            $products->whereIn('category_id', $request->categories);
        }

        // Filter by Brand
        if ($request->has('brands')) {
            $products->whereIn('brand_id', $request->brands);
        }

        // Filter by Price
        if ($request->has('price')) {
            $priceFilters = $request->price;
            $products->where(function ($query) use ($priceFilters) {
                if (in_array('under_100', $priceFilters)) {
                    $query->orWhere('price', '<', 100);
                }
                if (in_array('over_100', $priceFilters)) {
                    $query->orWhere('price', '>=', 100);
                }
            });
        }

        // Paginate the filtered results
        $products = $products->paginate(8);

        return view('products.show', [
            'products' => $products,
            'tags' => Tag::all(),
            'categories' => Category::all(),
            'brands' => Brand::all(),
            'genders' => Gender::all(),
        ]);
    }
    public function filter(Request $request)
    {
        // dd($request->all());
        $query = Product::query();

        // Filter by multiple Genders
        if ($request->has('genders') && is_array($request->genders) && !empty($request->genders)) {
            $query->whereIn('gender_id', $request->genders);
        }

        // Filter by multiple Categories
        if ($request->has('categories') && is_array($request->categories) && !empty($request->categories)) {
            $query->whereIn('category_id', $request->categories);
        }

        // Filter by multiple Brands
        if ($request->has('brands') && is_array($request->brands) && !empty($request->brands)) {
            $query->whereIn('brand_id', $request->brands);
        }

        // Filter by Price Range
        if ($request->filled('min_price') && $request->filled('max_price')) {
            $query->whereBetween('price', [(float) $request->min_price, (float) $request->max_price]);
        } elseif ($request->filled('min_price')) {
            $query->where('price', '>=', (float) $request->min_price);
        } elseif ($request->filled('max_price')) {
            $query->where('price', '<=', (float) $request->max_price);
        }
        // Get filtered products with pagination
        $products = $query->paginate(8);

        return view('products.show', [
            'products' => $products,
            'tags' => Tag::all(),
            'categories' => Category::all(),
            'brands' => Brand::all(),
            'genders' => Gender::all(),
        ]);
    }
    public function wishlist()
    {
        return view('products.wishlist', [
            'products' => Product::all()->toArray(),
            'tags' => Tag::all(),
        ]);
    }
    public function detail($id)
    {
        $product = Product::with(['images', 'reviews'])->findOrFail($id);

        return view('products.detail', [
            'product' => $product, // Correct product instance
            'products' => Product::inRandomOrder()->limit(4)->get(), // Fetch random products
            'tags' => Tag::all(),
            'reviews' => $product->reviews()->latest()->get(), // Get latest reviews
        ]);
    }

    public function contact()
    {
        return view('products.contact');
    }
    public function terms()
    {
        return view('products.terms');
    }
    public function create()
    {
        $genders = Gender::all();
        $brands = Brand::all();
        $categories = Category::all();
        return view('products.create', compact('brands', 'categories', 'genders'));
    }
    public function store(Request $request)
    {


        //validation
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'brand_id' => 'required|exists:brands,id',
            // 'type' => 'required|string|max:255',
            // 'department' => 'required|string|max:255',
            // 'scent_note' => 'required|string|max:255',
            'price' => 'required|numeric',
            'size' => 'required|integer',
            'category_id' => 'required|exists:categories,id',
            'gender_id' => 'required|exists:genders,id',
            'stock' => 'required|integer',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048' // Image validation
        ]);

        // dd($request->all());

        // dd($request->images);
        // Create product
        $product = new Product();
        $product->admin_id = auth()->id();
        $product->name = $request->name;
        $product->description = $request->description;
        $product->brand_id = $request->brand_id;
        // $product->type = $request->type;
        // $product->department = $request->department;
        // $product->scent_note = $request->scent_note;
        $product->price = $request->price;
        $product->size = $request->size;
        $product->category_id = $request->category_id;
        $product->gender_id = $request->gender_id;
        $product->stock = $request->stock;
        $product->save();
        // Handle multiple image uploads
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('products', 'public'); // Store in storage/app/public/products

                // Save image to product_images table
                ProductImage::create([
                    'product_id' => $product->id,
                    'image_url' => $path,
                ]);
            }
        }

        return redirect()->route('admin.products.index')->with('success', 'Product added successfully!');
    }
}
