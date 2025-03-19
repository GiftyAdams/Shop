<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Brand;
use App\Models\Gender;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    // public function __invoke()
    // {
    //     dd(request('q'));
    // }
    // public function search(Request $request)
    // {
    //     //get items from search input field
    //     $q = $request->input('q');

    //     //fetch fror products
    //     return view('search', [
    //         'products' => Product::where('name', 'like', "${$q}%")->get(),
    //         'products' => Product::paginate(8),
    //         'tags' => Tag::all(),
    //     ]);
    // }
    public function search(Request $request)
{
    $query = $request->input('q');
    // dd($query);
    $products = Product::where('name', 'LIKE', "%{$query}%")->paginate(10);
    $categories = Category::all();
    $brands = Brand::all();
    $genders = Gender::all();

    // dd($products); // Debugging: Check if data is retrieved

    return view('search', compact('products', 'query', 'categories', 'brands', 'genders'));
}

}
