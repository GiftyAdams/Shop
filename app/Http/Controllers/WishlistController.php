<?php

namespace App\Http\Controllers;


use App\Models\Wishlist;
use Illuminate\Http\Request;
use id;

class WishlistController extends Controller
{
    public function index()
    {
        $wishlistItems = Wishlist::where('user_id', auth()->id())
            ->with('product')
            ->get();

        return view('wishlist.index', compact('wishlistItems'));
    }
    public function addToWishlist(Request $request)
    {
        // Validation
        $request->validate([
            'product_id' => 'required|exists:products,id',
        ]);


        $user_id = auth()->id();
        $product_id = $request->input('product_id');

        // Check if the product is already in the wishlist
        $wishlistItem = Wishlist::where('user_id', $user_id)
            ->where('product_id', $product_id)
            ->first();

        if ($wishlistItem) {
            return redirect()->back()->with('error', 'Product already in wishlist');
        }

        // Add product to wishlist
        Wishlist::create([
            'user_id' => $user_id,
            'product_id' => $product_id,
        ]);

        return redirect()->back()->with('success', 'Product added to wishlist successfully');
    }

    public function removeFromWishlist(Request $request)
    {
        $user_id = auth()->id();
        $product_id = $request->input('product_id');
    
        // Check if the product is in the wishlist
        $wishlistItem = Wishlist::where('user_id', $user_id)
            ->where('product_id', $product_id)
            ->first();
    
        if ($wishlistItem) {
            $wishlistItem->delete();
            return redirect()->back()->with('success', 'Product removed from wishlist successfully');
        }
    
        return redirect()->back()->with('error', 'Product not found in wishlist');
    }

}    
