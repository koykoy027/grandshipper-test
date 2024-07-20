<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserProfile>
 */
class UserProfileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    private static $id = 1;
    public function definition(): array
    {
        return [
            'id' => self::$id++,
            'firstname' => fake()->firstName(),
            'middlename' => fake()->lastName(),
            'lastname' => fake()->lastName(),
            'gender' => fake()->numberBetween(1, 2),
            'civil_status' => fake()->numberBetween(3, 6),
            'religion' => fake()->numberBetween(7, 9),
            'is_admin' => fake()->numberBetween(0, 1),
            'is_required_to_change_password' => fake()->numberBetween(0, 1),
            'is_otp_enabled' => fake()->numberBetween(0, 1),
            'is_active' => fake()->numberBetween(0, 1),
            'email_verified_at' => now(),
            'created_by' => fake()->numberBetween(1, 10),
            'updated_by' => fake()->numberBetween(1, 10),
        ];
    }
}
