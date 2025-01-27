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
    public function show()
    {
        return view('products.show', [
            'products' => Product::all()->toArray(),
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
}