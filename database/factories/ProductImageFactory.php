<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProductImage>
 */
class ProductImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'product_id' => null, // This will be auto-filled by has(ProductImage::factory(5))
            'image_url' => 'images/default.jpg', // Generate a default or fake image
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
