<?php

namespace Database\Factories;

use App\Models\PlatformUser;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends Factory<PlatformUser>
 */
class PlatformUserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $userName = $this->faker->randomElement([
            'Haris',
            'Hamza',
            'Atif',
            'Shawaiz',
            'Zohaib',
            'Husnain',
            'Ahsan',
            'Zain',
        ]);

        return [
            'name' => $userName,
            'email' => strtolower($userName).random_int(1, 100).'@gmail.com',
            'phone' => $this->faker->phoneNumber(),
            'avatar' => 'https://placehold.co/300x300/EEE/31343C?text='.str_replace(' ', '-', $userName),
            'is_active' => true,
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
