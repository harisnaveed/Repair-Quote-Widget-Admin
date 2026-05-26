<?php

namespace Database\Seeders;

use App\Models\Location;
use App\Models\LocationProductRepairIssuePricing;
use App\Models\Product;
use App\Models\RepairIssue;
use Illuminate\Database\Seeder;

class LocationProductRepairIssuePricingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $locations = Location::all();

        $products = Product::all();

        $issues = RepairIssue::all();

        foreach ($locations as $location) {

            foreach ($products as $product) {

                foreach ($issues as $issue) {

                    LocationProductRepairIssuePricing::create([
                        'location_id' => $location->id,
                        'product_id' => $product->id,
                        'repair_issue_id' => $issue->id,
                        'price' => fake()->randomFloat(2, 0, 1000),
                        'is_active' => fake()->boolean(),
                    ]);
                }
            }
        }
    }
}
