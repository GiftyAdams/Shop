<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Address;
use App\Models\Product;
use App\Models\CartItem;
use App\Models\OrderItem;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class CartController extends Controller
{
    public function index()
    {
        $cartItems = CartItem::where('user_id', auth()->id())
            ->with('product')
            ->get();

        return view('cart.index', compact('cartItems'));
    }
    public function addToCart(Request $request)
    {
        //check if user is logged in
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        //validation
        $request->validate([
            'product_id' => 'required|exists:products,id'
        ]);
        // 
        $user_id = auth()->id();
        $product_id = $request->input('product_id');

        // Check if the product is already in the wishlist
        $cartItem = CartItem::where('user_id', $user_id)
            ->where('product_id', $product_id)
            ->first();

        //check if item exists in the cart
        if ($cartItem) {
            return redirect()->back()->with('error', 'Product already in cart');
        }
        //create cart item
        $cartItem = CartItem::create([
            'user_id' => $user_id,
            'product_id' => $product_id

        ]);

        return redirect()->back()->with(
            $cartItem ? 'success' : 'error',
            $cartItem ? 'Product added to cart successful' : 'Product not added to cart'
        );
    }
    public function removeFromCart(Request $request)
    {

        $user_id = auth()->id();
        $product_id = $request->input('product_id');

        // Check if the product is in the wishlst
        $cartItem = CartItem::where('user_id', $user_id)
            ->where('product_id', $product_id)
            ->first();

        if ($cartItem) {
            $cartItem->delete();
            return redirect('cart')->with('success', 'Product removed from cart successfully');
        }

        return redirect()->back()->with('error', 'Product not found in wishlist');
    }
    public function updateQuantity(CartItem $cart, Request $request)
    {
        $cart_id = $request->input('cart_item_id');
        $cartItem = $cart->where('id', $cart_id)->where('user_id', auth()->id())->first();
        $cartItem->quantity = $request->input('quantity');
        $cartItem->save();

        return response()->json([
            'status' => "ok",
        ]);
    }
    public function showCart()
    {
        $cartItems = CartItem::where('user_id', auth()->id())->get();
        $cartTotal = $this->cartTotal();
        return view('cart.index', compact('cartItems', 'cartTotal'));
    }
    public function cartTotal()
    {
        $cartItems = CartItem::where('user_id', auth()->id())->get();
        $total = 0;
        foreach ($cartItems as $cartItem) {
            $total += $cartItem->product->price * $cartItem->quantity;
        }
        return $total;
    }
    public function checkout()
    {
        $cartItems = CartItem::where('user_id', auth()->id())->get();
        $cartTotal = $this->cartTotal();
        return view('cart.checkout', compact('cartItems', 'cartTotal'));
    }

    public function addAddress(Request $request)
    {
        // Validate the form inputs
        $request->validate([
            'first_name'   => 'required|string|max:255',
            'last_name'    => 'required|string|max:255',
            'phone_number' => 'required|string|max:20',
            'address'      => 'required|string|max:255',
        ]);

        // Save the address to the database
        $address = new Address();
        $address->user_id = Auth::id(); // Associate with the logged-in user
        $address->first_name = $request->first_name;
        $address->last_name = $request->last_name;
        $address->phone_number = $request->phone_number;
        $address->address = $request->address;
        $address->save();

        // Redirect to the payment details page
        return redirect()->route('cart.payment')->with('success', 'Address saved successfully!');
    }
    public function showPaymentPage()
    {
        return view('cart.payment');
    }
    public function showReviewPage(Request $request)
    {
        $paymentMethod = $request->get('payment');
        $address = auth()->user()->addresses()->latest()->first(); 
        $cartItems = CartItem::where('user_id', auth()->id())->get();
        $cartTotal = $this->cartTotal();  
        return view('cart.review', compact('cartItems', 'cartTotal', 'address', 'paymentMethod'));
    }
}
