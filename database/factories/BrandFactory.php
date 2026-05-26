<?php

namespace Database\Factories;

use App\Models\Brand;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Brand>
 */
class BrandFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $brand = [
            'Apple',
            'Samsung',
            'Google',
            'Nintendo',
            'Microsoft',
            'Sony',
        ];

        $brand = fake()->unique()->randomElement($brand);

        return [
            'name' => $brand,
            'slug' => strtolower(str_replace(' ', '-', $brand)),
            'icon' => 'https://placehold.co/300x300/EEE/31343C?text='.str_replace(' ', '-', $brand),
            'location_id' => null,
        ];
    }
}
