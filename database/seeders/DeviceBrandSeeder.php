<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Device;
use Illuminate\Database\Seeder;

class DeviceBrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $devices = Device::all();
        $brands = Brand::all();
        $randomBrands = $brands
            ->random(rand(1, 3))
            ->pluck('id');
        foreach ($devices as $device) {
            $device->brands()->attach($randomBrands);
        }
    }
}
