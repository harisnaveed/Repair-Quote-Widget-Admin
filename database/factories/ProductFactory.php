<?php

namespace Database\Factories;

use App\Models\Brand;
use App\Models\Device;
use App\Models\Product;
use App\Models\ProductSeries;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Product>
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
        $products = [
            [
                'name' => 'iPhone 16 Pro Max',
                'brand' => 'Apple',
                'device' => 'Smartphone',
                'product_series' => null,
            ],
            [
                'name' => 'Samsung Galaxy S25 Ultra',
                'brand' => 'Samsung',
                'device' => 'Smartphone',
                'product_series' => 'S Series',
            ],
            [
                'name' => 'Google Pixel 9 Pro',
                'brand' => 'Google',
                'device' => 'Smartphone',
                'product_series' => 'Pixel Series',
            ],
            [
                'name' => 'iPad Pro M4',
                'brand' => 'Apple',
                'device' => 'Tablet',
                'product_series' => 'iPad Pro',
            ],
            [
                'name' => 'iWatch Series 9',
                'brand' => 'Apple',
                'device' => 'Smartwatches',
                'product_series' => null,
            ],
            [
                'name' => 'MacBook Pro 16',
                'brand' => 'Apple',
                'device' => 'Laptop',
                'product_series' => 'MacBook Pro',
            ],
            [
                'name' => 'PlayStation 5',
                'brand' => 'Sony',
                'device' => 'Gaming Consoles',
                'product_series' => 'PlayStation',
            ],
            [
                'name' => 'Xbox Series X',
                'brand' => 'Microsoft',
                'device' => 'Gaming Consoles',
                'product_series' => 'Xbox',
            ],
            [
                'name' => 'Nintendo Switch',
                'brand' => 'Nintendo',
                'device' => 'Gaming Consoles',
                'product_series' => 'Nintendo',
            ],
        ];

        $product = fake()->unique()->randomElement($products);

        $brand = Brand::where('name', $product['brand'])->first();

        $device = Device::where('name', $product['device'])->first();

        $productSeries = ProductSeries::where('name', $product['product_series'] ?? null)->first();

        return [
            'name' => $product['name'],

            'slug' => str()->slug($product['name']),

            'description' => fake()->sentence(),

            'icon' => 'https://placehold.co/300x300/EEE/31343C?text='
                .urlencode($product['name']),

            'device_id' => $device?->id,

            'brand_id' => $brand?->id,

            'product_series_id' => $productSeries?->id,

            'location_id' => null,
        ];
    }
}
