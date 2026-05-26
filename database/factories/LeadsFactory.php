<?php

namespace Database\Factories;

use App\Models\Company;
use App\Models\Leads;
use App\Models\Location;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Leads>
 */
class LeadsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $location = Location::inRandomOrder()->first();
        $company = Company::inRandomOrder()->first();

        if (! $location || ! $company) {
            return [];
        }

        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->email(),
            'phone' => $this->faker->phoneNumber(),
            'message' => $this->faker->sentence(),
            'preference' => $this->faker->randomElement(['email', 'phone', 'sms']),
            'source' => $this->faker->randomElement(['website', 'social media', 'referral']),
            'location_id' => $location->id,
            'company_id' => $company->id,
        ];
    }
}
