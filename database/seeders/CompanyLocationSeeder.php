<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\Location;
use Illuminate\Database\Seeder;

class CompanyLocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // create 5 companies, each with 1-3 locations
        // Company::factory()
        //     ->count(5)
        //     ->has(Location::factory()->count(rand(1, 3)))
        //     ->create();

        Company::factory()
            ->count(5)
            ->create()
            ->each(function ($company) {

                Location::factory()
                    ->count(rand(1, 3))
                    ->create([
                        'company_id' => $company->id,
                        'name' => "{$company->name} - ".fake()->city().' Branch',
                    ]);
            });
    }
}
