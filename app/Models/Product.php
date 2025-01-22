<?php

namespace App\Models;


use App\Models\Tag;
use App\Models\Admin;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends Model
{
    /** @use HasFactory<\Database\Factories\ProductFactory> */
    use HasFactory;

    public function tag(string $name): void
    {
       $tag = Tag::firstOrCreate(['name' => $name ]);
       $this->tags()->attach($tag);
    }
    
    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }
    
     public function product(): BelongsTo
     {
        return $this->belongsT0(Admin::class);
     }
}