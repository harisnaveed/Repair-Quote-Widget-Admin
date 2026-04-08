<?php

namespace Database\Factories;

use App\Models\Company;
use App\Models\Location;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Location>
 */
class LocationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'company_id' => Company::factory(), // auto-create company if not passed
            'name' => $this->faker->city().' Branch',
            'slug' => strtolower(str_replace(' ', '-', $this->faker->city().' Branch')),
            'email' => $this->faker->unique()->safeEmail(),
            'phone' => $this->faker->phoneNumber(),
            'address' => $this->faker->address(),
            'gmb_link' => $this->faker->url(),
            'notification_email' => $this->faker->unique()->safeEmail(),
            'notification_phone' => $this->faker->phoneNumber(),
        ];
    }
}
