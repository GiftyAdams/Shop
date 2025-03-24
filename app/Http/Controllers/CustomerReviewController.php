<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\CustomerReview;

class CustomerReviewController extends Controller
{
    public function store(Request $request, Product $product)
    {
        if (!auth()->check()) {
            return back()->with('error', 'You must be logged in to submit a review.');
        }
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'review' => 'required',
        ]);

     //user should be able to submit review three times
        $existingReview = CustomerReview::where('product_id', $product->id)
            ->where('user_id', auth()->user()->id)
            ->count();

        if ($existingReview >= 3) {
            return redirect()->back()->with('error', 'You have already submitted three reviews for this product.');

        }

        CustomerReview::create([
            'product_id' => $product->id,
            'name' => request('name'),
            'email' => request('email'),
            'review' => request('review'),
        ]);

        return redirect()->back()->with('success', 'Review submitted successfully.');
    }
    public function show(Product $product)
    {
        $reviews = CustomerReview::where('product_id', $product->id)->get();
        return view('admin.reviews', compact('product', 'reviews'));
    }
    public function destroy($id)
    {
        $review = CustomerReview::find('id');
        if (!$review) {
            return redirect()->back()->with('error', 'Review not found.');
        }
        $review->delete();
        return redirect()->back()->with('success', 'Review deleted successfully.');
    }
}
