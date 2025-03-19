<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\CustomerReview;

class CustomerReviewController extends Controller
{
    public function store(Request $request, Product $product)
    {
        if(!auth()->check()){
            return back()->with('error', 'You must be logged in to submit a review.');
        }
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'review' => 'required',
        ]);

        CustomerReview::create([
            'product_id' => $product->id,
            'name' => request('name'),
            'email' => request('email'),
            'review' => request('review'),
        ]);
        
        return redirect()->back()->with('success', 'Review submitted successfully.');
    }
}
