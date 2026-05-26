<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\Location;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

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
                    ->count($company->no_of_locations)
                    ->create(function () use ($company) {

                        $city = ucwords(fake()->city());

                        $locationName = "{$company->name} - {$city} Branch";

                        return [
                            'company_id' => $company->id,

                            'name' => $locationName,
                            'slug' => Str::slug($locationName),

                            'email' => fake()->unique()->safeEmail(),
                            'phone' => fake()->phoneNumber(),

                            'address' => fake()->address(),
                            'gmb_link' => fake()->url(),

                            'notification_email' => fake()->unique()->safeEmail(),
                            'notification_phone' => fake()->phoneNumber(),

                            'is_active' => true,

                            'created_at' => now(),
                            'updated_at' => now(),
                        ];
                    });
            });
    }
}
