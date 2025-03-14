<?php

namespace Database\Factories;

use App\Models\Admin;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'admin_id' => Admin::factory(),
            'name' => fake()->name,
            'description' => fake()->text(),
            'price' => fake()->randomFloat(2, 150, 300),
            'category' => fake()->text(),
            'brand' => fake()->text(),
            'stock' => fake()->randomDigit(),
            'type' => fake()->text(),
            'department' => fake()->text(),
            'scent_note' => fake()->text(),
            'size' => fake()->randomDigit(),

        ];
        
    }
}
