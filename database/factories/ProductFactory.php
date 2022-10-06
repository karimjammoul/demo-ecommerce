<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

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
    public function definition()
    {
        $productSuffixes = ['Sweater', 'Pants', 'Shirt', 'Glasses', 'Hat', 'Socks'];
        $name = fake()->company() . ' ' . Arr::random($productSuffixes);

        return [
            'name' => $name,
            'slug' => Str::slug($name),
            'description' => fake()->realText(320),
            'price' => fake()->numberBetween(10000, 100000)
        ];
    }
}
