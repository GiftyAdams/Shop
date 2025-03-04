<?php

namespace App\Models;

use App\Models\Tag;
use App\Models\Admin;
use App\Models\ProductImage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    /** @use HasFactory<\Database\Factories\ProductFactory> */
    use HasFactory;

    public function tag(string $name): void
    {
        $tag = Tag::firstOrCreate(['name'=> $name]);
        
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
        return $this->hasmany(ProductImage::class);
    }
}