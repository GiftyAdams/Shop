<?php

namespace Database\Seeders;

use App\Models\Tag;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\ProductImage;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::factory(20)
    ->has(ProductImage::factory(5), 'images') // Attach 5 images per product
    ->hasAttached(Tag::factory(1))  // Attach 1 tags per product
    ->create();
    }
}