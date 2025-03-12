<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\CartItem;
use App\Models\OrderItem;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::where('user_id', Auth::id())->with('orderItems.product')->get();
        return view('profile.orders', compact('orders'));
    }

    public function show(Order $order)
    {
        if ($order->user_id !== Auth::id()) {
            abort(403, 'Unauthorized access');
        }
        return view('profile.show', compact('order'));
    }
    public function cancel(Order $order)
    {
        if ($order->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action');
        }

        if ($order->status !== 'Processing') {
            return redirect()->back()->with('error', 'Order cannot be canceled at this stage.');
        }

        $order->update(['status' => 'Canceled']);

        return redirect()->route('orders.index')->with('success', 'Order canceled successfully.');
    }
    public function placeOrder(Request $request)
    {
        $user = Auth::user();
        $cartItems = CartItem::where('user_id', $user->id)->get();

        if ($cartItems->isEmpty()) {
            return redirect()->back()->with('error', 'Your cart is empty.');
        }

        //taking address input
        $request->validate([
            'address' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'phone_number' => 'required',
        ]);
        // Calculate total price
        $totalPrice = $cartItems->sum(fn($item) => $item->product->price * $item->quantity);

        // Create Order
        $order = Order::create([
            'user_id' => $user->id,
            'order_number' => strtoupper(Str::random(10)), // Unique Order Number
            'total_price' => $totalPrice,
            'status' => 'pending'
        ]);

   
        // Move Cart Items to Order Items
        foreach ($cartItems as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item->product_id,
                'quantity' => $item->quantity,
                'price' => $item->product->price
            ]);
        }

        // Delete Cart Items
        CartItem::where('user_id', $user->id)->delete();

        // Redirect to Orders Page
        return redirect()->route('profile.orders')->with('success', 'Order placed successfully!');
    }
}
