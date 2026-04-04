<?php

namespace Database\Seeders;

use App\Models\Device;
use App\Models\Location;
use Illuminate\Database\Seeder;

class DeviceLocationSeeder extends Seeder
{
    public function run(): void
    {
        // Ensure data exists
        if (Device::count() === 0) {
            Device::factory()->count(5)->create();
        }

        if (Location::count() === 0) {
            Location::factory()->count(5)->create();
        }

        $devices = Device::all();
        $locations = Location::all();

        // 🔥 Attach devices to locations with pivot data
        foreach ($devices as $device) {

            // Pick 1–3 random locations
            $selectedLocations = $locations->random(
                min(rand(1, 3), $locations->count())
            );

            $attachData = [];

            foreach ($selectedLocations as $index => $location) {
                $attachData[$location->id] = [
                    'status' => 'active',
                    'position' => $index + 1, // ordered per device
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }

            // Attach without removing existing
            $device->locations()->syncWithoutDetaching($attachData);
        }

        // 🔥 Ensure each location has at least ONE device
        foreach ($locations as $location) {

            if ($location->devices()->count() === 0) {

                $device = $devices->random();

                $location->devices()->attach($device->id, [
                    'status' => 'active',
                    'position' => 1,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
