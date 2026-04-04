<?php

namespace Database\Seeders;

use App\Models\Device;
use App\Models\Location;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;

class DeviceLocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $deviceIds = Device::pluck('id')->toArray();
        $locationIds = Location::pluck('id')->toArray();

        // Ensure there are devices and locations to attach
        if (empty($deviceIds) || empty($locationIds)) {
            Device::factory()->count(5)->create();
            Location::factory()->count(5)->create();
            $deviceIds = Device::pluck('id')->toArray();
            $locationIds = Location::pluck('id')->toArray();
        }

        // Attach each device to 1..3 random locations
        foreach (Device::all() as $device) {
            $count = min(rand(1, 3), count($locationIds));
            $attach = Arr::random($locationIds, $count);
            if (! is_array($attach)) {
                $attach = [$attach];
            }
            $device->locations()->syncWithoutDetaching($attach);
        }

        // Ensure each location has at least one device
        foreach (Location::all() as $location) {
            if ($location->devices()->count() === 0) {
                $deviceId = Device::inRandomOrder()->first()->id;
                $location->devices()->attach($deviceId);
            }
        }
    }
}
