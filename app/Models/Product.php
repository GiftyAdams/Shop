<?php

namespace App\Models;

use App\Models\Admin;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    /** @use HasFactory<\Database\Factories\ProductFactory> */
    use HasFactory;

    public function tag()
    {
        
    }

    public function tags()
    {
        return [];
    }
    
    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
}