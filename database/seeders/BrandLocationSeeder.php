<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Location;
use Illuminate\Database\Seeder;

class BrandLocationSeeder extends Seeder
{
    public function run(): void
    {
        // Ensure data exists
        if (Brand::count() === 0) {
            Brand::factory()->count(5)->create();
        }

        if (Location::count() === 0) {
            Location::factory()->count(5)->create();
        }

        $brands = Brand::all();
        $locations = Location::all();

        // 🔥 Attach brands to locations with pivot data
        foreach ($brands as $brand) {

            // Pick 1–3 random locations
            $selectedLocations = $locations->random(
                min(rand(1, 3), $locations->count())
            );

            $attachData = [];

            foreach ($selectedLocations as $index => $location) {
                $attachData[$location->id] = [
                    'is_active' => true,
                    'position' => $index + 1, // ordered per brand
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }

            // Attach without removing existing
            $brand->locations()->syncWithoutDetaching($attachData);
        }

        // 🔥 Ensure each location has at least ONE brand
        foreach ($locations as $location) {

            if ($location->brands()->count() === 0) {

                $brand = $brands->random();

                $location->brands()->attach($brand->id, [
                    'is_active' => true,
                    'position' => 1,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
