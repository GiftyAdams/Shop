<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Brand;
use App\Models\Order;
use App\Models\Gender;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    // public function index()
    // {
    //     return view('admin.index');
    // }
    public function index()
    {
        return view('admin.index', [
            'activeOrders' => Order::where('status', 'active')->count(),
            'completedOrders' => Order::where('status', 'completed')->count(),
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
        $products = Product::latest()->paginate(10);
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
}
