<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Product;
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
    public function show(Product $product)
    {
        return view('products.show', [
            'products' => Product::all()->toArray(),
            'products' => Product::paginate(8),
            'tags' => Tag::all(),

        ]);
    }
    public function wishlist()
    {
        return view('products.wishlist', [
            'products' => Product::all()->toArray(),
            'tags' => Tag::all(),
        ]);
    }

    public function detail($id, Product $product)
    {
        return view('products.detail', [
            'product' => Product::with('images')->findOrFail($id), // Load images
            'products' => $product->inRandomOrder()->limit(4)->get()->toArray(),
            'tags' => Tag::all(),
        ]);
    }

    public function contact() {
        return view('products.contact');
    }
}