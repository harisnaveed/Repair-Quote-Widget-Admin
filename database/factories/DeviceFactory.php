<?php

namespace Database\Factories;

use App\Models\Device;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Device>
 */
class DeviceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $devices = [
            'Smartphone',
            'Tablet',
            'Laptop',
            'Smartwatches',
            'Gaming Consoles',
            'Desktop PCs',
            'Drones',
        ];

        $device = fake()->unique()->randomElement($devices);

        return [
            'name' => $device,
            'slug' => strtolower(str_replace(' ', '-', $device)),
            'icon' => 'https://placehold.co/300x300/EEE/31343C?text='.str_replace(' ', '-', $device),
            'location_id' => null,
        ];
    }
}
