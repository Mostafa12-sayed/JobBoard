<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
<<<<<<< HEAD
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => static::$password ??= Hash::make('password'),
            'remember_token' => Str::random(10),
=======
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'email_verified_at' => now(),
            'password' => \Illuminate\Support\Facades\Hash::make('password123'), // Always hash the password
            'role' => $this->faker->randomElement(['employer', 'candidate']),
            'phone_number' => $this->faker->phoneNumber,
            'profile_picture' => 'profile_pic_' . rand(1, 5) . '.jpg',
>>>>>>> 3a7c11c0f7c26e882b2a588b74bda85988f62f2b
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
<<<<<<< HEAD
        return $this->state(fn (array $attributes) => [
=======
        return $this->state(fn(array $attributes) => [
>>>>>>> 3a7c11c0f7c26e882b2a588b74bda85988f62f2b
            'email_verified_at' => null,
        ]);
    }
}
