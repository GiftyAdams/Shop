<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerReview extends Model
{
    /** @use HasFactory<\Database\Factories\CustomerReviewFactory> */
    use HasFactory;

    protected $fillable = ['name', 'email', 'review'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
