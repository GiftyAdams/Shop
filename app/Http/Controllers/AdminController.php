<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // public function index()
    // {
    //     return view('admin.index');
    // }
    public function index()
{
    return view('admin.index', [
        'recentOrders' => Order::latest()->with('product', 'user')->limit(5)->get(),
    ]);
}

    public function orders()
    {
        return view('admin.orders');
    }
    public function show()
    {
        $products = Product::latest()->paginate(10);
        return view ('admin.show', compact('products')); 
    }
}
