<?php

namespace App\Models;

use App\Models\Tag;
use App\Models\Admin;
use App\Models\Category;
use App\Models\ProductImage;
use App\Models\CustomerReview;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    /** @use HasFactory<\Database\Factories\ProductFactory> */
    use HasFactory;
    protected $guarded = [];

    public function tag(string $name): void
    {
        $tag = Tag::firstOrCreate(['name' => $name]);

        $this->tags()->attach($tag);
    }
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }
    public function reviews()
    {
        return $this->hasmany(CustomerReview::class);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    protected static function booted()
    {
        static::updated(function ($product) {
            if ($product->isDirty('stock')) {
                $message = null;

                if ($product->stock == 0) {
                    $message = "{$product->name} is out of stock!";
                } elseif ($product->stock < 5) {
                    $message = "{$product->name} stock is low! Consider restocking.";
                }

                if ($message) {
                    DB::table('notifications')->insert([
                        'message' => $message,
                        'created_at' => now(),
                    ]);
                }
            }
        });
    }
}
