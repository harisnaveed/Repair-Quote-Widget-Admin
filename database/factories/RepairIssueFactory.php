<?php

namespace Database\Factories;

use App\Models\Brand;
use App\Models\Device;
use App\Models\RepairIssue;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<RepairIssue>
 */
class RepairIssueFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $repairIssues = [
            [
                'name' => 'Screen Replacement',
                'device' => 'Smartphone',
                'brand' => 'Apple',
            ],
            [
                'name' => 'Battery Replacement',
                'device' => 'Smartphone',
                'brand' => 'Apple',
            ],
            [
                'name' => 'Charging Port Repair',
                'device' => 'Smartphone',
                'brand' => 'Apple',
            ],
            [
                'name' => 'Back Glass Replacement',
                'device' => 'Tablet',
                'brand' => 'Apple',
            ],
            [
                'name' => 'Camera Repair',
                'device' => 'Laptop',
                'brand' => 'Apple',
            ],
            [
                'name' => 'Speaker Repair',
                'device' => 'Desktop PCs',
                'brand' => 'Apple',
            ],
            [
                'name' => 'Microphone Repair',
                'device' => 'Desktop PCs',
                'brand' => 'Apple',
            ],
            [
                'name' => 'Water Damage Repair',
                'device' => 'Gaming Consoles',
                'brand' => 'Apple',
            ],
            [
                'name' => 'Gaming Console Repair',
                'device' => 'Gaming Consoles',
                'brand' => 'Sony',
            ],
            [
                'name' => 'Screen Replacement',
                'device' => 'Smartwatches',
                'brand' => 'Apple',
            ],
            [
                'name' => 'Screen Replacement',
                'device' => 'Laptop',
                'brand' => 'Apple',
            ],
        ];

        $repairIssue = fake()->unique()->randomElement($repairIssues);
        $device = Device::where('name', $repairIssue['device'])->first();
        $brand = Brand::where('name', $repairIssue['brand'])->first();

        return [
            'name' => $repairIssue['name'],
            'slug' => str()->slug($repairIssue['name']),
            'description' => fake()->sentence(),
            'icon' => 'https://placehold.co/300x300/EEE/31343C?text='.urlencode($repairIssue['name']),
            'device_id' => $device->id,
            'brand_id' => $brand->id,
            'location_id' => null,
        ];
    }
}
