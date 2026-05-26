<?php

namespace Database\Factories;

use App\Models\Company;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<Company>
 */
class CompanyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $companyName = ucwords($this->faker->company());

        return [
            'name' => $companyName,
            'slug' => Str::slug($companyName),
            'email' => $this->faker->unique()->safeEmail(),
            'phone' => $this->faker->phoneNumber(),
            'no_of_locations' => $this->faker->numberBetween(1, 3),
            'is_active' => true,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
