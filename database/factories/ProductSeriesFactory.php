<?php

namespace Database\Factories;

use App\Models\Brand;
use App\Models\ProductSeries;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<ProductSeries>
 */
class ProductSeriesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $productSeries = [
            [
                'name' => 'S Series',
                'brand' => 'Samsung',
            ],
            [
                'name' => 'Pixel Series',
                'brand' => 'Google',
            ],
            [
                'name' => 'iPad Pro',
                'brand' => 'Apple',
            ],
            [
                'name' => 'MacBook Pro',
                'brand' => 'Apple',
            ],
            [
                'name' => 'PlayStation',
                'brand' => 'Sony',
            ],
            [
                'name' => 'Xbox',
                'brand' => 'Microsoft',
            ],
            [
                'name' => 'Nintendo',
                'brand' => 'Nintendo',
            ],
        ];

        $productSeries = fake()->unique()->randomElement($productSeries);
        $brand = Brand::where('name', $productSeries['brand'])->first();
        $position = (ProductSeries::max('position') ?? 0) + 10;

        return [
            'brand_id' => $brand->id,
            'parent_id' => null,
            'name' => $productSeries['name'],
            'slug' => str()->slug($productSeries['name']),
            'description' => fake()->sentence(),
            'icon' => 'https://placehold.co/300x300/EEE/31343C?text='.urlencode($productSeries['name']),
            'is_active' => true,
            'position' => $position,
        ];
    }
}
