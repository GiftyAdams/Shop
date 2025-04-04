<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Brand;
use App\Models\Order;
use App\Models\Gender;
use App\Models\Product;
use App\Models\Category;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    // public function index()
    // {
    //     return view('admin.index');
    // }
    public function index()
    {
        return view('admin.index', [
            'activeOrders' => Order::where('status', 'pending')->count(),
            'completedOrders' => Order::where('status', 'delivered')->count(),
            'cancelledOrders' => Order::where('status', 'cancelled')->count(),
            'recentOrders' => Order::latest()->with('product', 'user')->limit(5)->get(),
            'totalOrders' => Order::count(),
            'orders' => Order::all(),

        ]);
    }

    public function orders()
    {
        $orders = Order::with('product')->orderBy('created_at', 'desc')->get();
        return view('admin.orders', compact('orders'));
    }

    public function show()
    {
        $products = Product::oldest()->paginate(10);
        $orders = Order::where('user_id', Auth::id())->with('orderItems.product')->get();
        return view('admin.show', compact('products', 'orders'));
    }
    public function customers()
    {
        $users = User::all();
        return view('admin.customer', compact('users'));
    }
    public function categories()
    {
        return view('admin.categories', [
            'categories' => Category::all(),
        ]);
    }
    public function brands()
    {
        return view('admin.brands', [
            'brands' => Brand::all(),
        ]);
    }
    public function genders()
    {
        return view('admin.genders', [
            'genders' => Gender::all(),
        ]);
    }
    public function notifications()
    {
        $products = Product::oldest()->get();
        return view('admin.notifications', compact('products'));
    }
    public function showProduct($id)
    {

        return view('admin.show-product', [
            'product' => Product::findOrFail($id),
            'genders' => Gender::all(),
            'brands' => Brand::all(),
            'categories' => Category::all(),
        ]);
    }
    public function edit($id)
    {
        return view('admin.product-edit', [
            'product' => Product::findOrFail($id),
            'genders' => Gender::all(),
            'brands' => Brand::all(),
            'categories' => Category::all(),
        ]);
    }
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'brand_id' => 'required|exists:brands,id',
            'price' => 'required|numeric',
            'size' => 'required|integer',
            'category_id' => 'required|exists:categories,id',
            'gender_id' => 'required|exists:genders,id',
            'stock' => 'required|integer',
        ]);

        //update the product
        $product->update($request->only([
            'name',
            'description',
            'brand_id',
            'price',
            'size',
            'category_id',
            'gender_id',
            'stock',
        ]));

        //update the product images

        if ($request->hasFile('images')) {
            $product->images()->delete();
            foreach ($request->file('images') as $image) {
                $image_url = $image->store('products', 'public');
                ProductImage::create([
                    'product_id' => $product->id,
                    'image_url' => $image_url,
                ]);
            }
        }

        return redirect()->route('admin.product.show', $product->id)->with('success', 'Product updated successfully!');
    }
    public function adminSearch(Request $request)
    {
        $query = $request->input('q');
        // dd($query);
        $products = Product::where('name', 'LIKE', "%{$query}%")->paginate(10);
        $categories = Category::all();
        $brands = Brand::all();
        $genders = Gender::all();
    
        // dd($products); // Debugging: Check if data is retrieved
    
        return view('admin-search', compact('products', 'query', 'categories', 'brands', 'genders'));
    }
}
