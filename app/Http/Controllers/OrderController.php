<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Address;
use App\Models\Product;
use App\Mail\OutOfStock;
use App\Models\CartItem;
use App\Mail\NeedRestock;
use App\Models\OrderItem;
use Illuminate\Support\Str;
use App\Mail\OrderConfirmed;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

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
    public function placeOrder(Request $request)
    {

        $user = Auth::user();
        $cartItems = CartItem::where('user_id', $user->id)->get();

        if ($cartItems->isEmpty()) {
            return redirect()->back()->with('error', 'Your cart is empty.');
        }

        // Get the most recent address entered by the user
        $address = Address::where('user_id', $user->id)->latest()->first();

        if (!$address) {
            return redirect()->back()->with('error', 'Please add an address before placing an order.');
        }

        // Calculating total price
        $totalPrice = $cartItems->sum(fn($item) => $item->product->price * $item->quantity);

        // Create Order
        $order = Order::create([
            'user_id' => $user->id,
            'order_number' => strtoupper(Str::random(10)), // Unique Order Number
            'total_price' => $totalPrice,
            'status' => 'pending'
        ]);

        //linking the address to the order
        $address->order_id = $order->id;
        $address->save();

        // Move Cart Items to Order Items
        foreach ($cartItems as $item) {

            // dump($item->quantity);
            $product = $item->product;
            // dd($product->stock);
            if ($product->stock < $item->quantity) {
                return redirect()->back()->with('error', "Not enough stock for {$product->name}.");
            }

            //Reduce stock
            $product->stock -= $item->quantity;
            $product->save();

            // send out of stock email if stock = 0
            if ($product->stock == 0) {
                Mail::to('giftyadams577@gmail.com')->send(new OutOfStock($product));
        
            }

            //send restock email if stock <= 5
            elseif ($product->stock <= 5) {
                Mail::to('giftyadams577@gmail.com')->send(new NeedRestock($product));
            }


            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item->product_id,
                'quantity' => $item->quantity,
                'price' => $item->product->price
            ]);
        }

        // Delete Cart Items
        CartItem::where('user_id', $user->id)->delete();

        // Send confirmation email
        Mail::to($order->user->email)->send(new OrderConfirmed($order));

        // Redirect to Orders Page
        return redirect()->route('profile.orders')->with('success', 'Order placed successfully!');
    }
    public function showorder(Order $order)
    {
        $orderItems = $order->orderItems()->with('product')->get();
        return view('admin.showorder', compact('order', 'orderItems'));
    }
    public function updateStatus(Request $request, Order $order)
    {
        $request->validate([
            'status' => 'required|in:pending,shipped,delivered,canceled',
        ]);

        $order->update(['status' => $request->status]);

        return redirect()->route('admin.orders.show', $order->id)->with('success', 'Order status updated successfully.');
    }


    public function cancel(Order $order)
    {
        if ($order->status === 'pending') {
            foreach ($order->orderItems as $item) {
                $product = Product::find($item->product_id);
                if ($product) {
                    $product->stock += $item->quantity; // Restore stock
                    $product->save();
                }
            }

            $order->status = 'cancelled';
            $order->save();

            return redirect()->back()->with('success', 'Order has been cancelled.');
        }

        return redirect()->back()->with('error', 'Only pending orders can be cancelled.');
    }

    public function destroy(Order $order)
    {
        if ($order->status !== 'cancelled') {
            return redirect()->back()->with('error', 'Only cancelled orders can be deleted.');
        }

        $order->delete();

        return redirect()->back()->with('success', 'Order deleted successfully.');
    }
}
