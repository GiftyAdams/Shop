<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $cartItems = CartItem::with('product')->where('user_id', auth()->id())->get();
        return view('cart.index', compact('cartItems'));
    } 
}
