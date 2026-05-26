<?php

namespace Database\Seeders;

use App\Models\ProductSeries;
use Illuminate\Database\Seeder;

class ProductSeriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ProductSeries::factory()->count(7)->create();
    }
}
