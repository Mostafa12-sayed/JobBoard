<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\EmployeeUser>
 */
class EmployeeUserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    
    public function definition(): array
    {
        $user = User::where('role', 'employer')->inRandomOrder()->first();

        // If no candidate user exists, create one
        if (!$user) {
            $user = User::factory()->create(['role' => 'candidate']);
        }
        return [
            'user_id' => $user->id, // Create a User and use its ID
            'company_name' => $this->faker->company, // Fake company name
            'company_logo' => $this->faker->imageUrl(100, 100, 'business'), // Fake company logo URL
            'position' => $this->faker->jobTitle, // Fake job position
            'phone_number' => $this->faker->phoneNumber, // Fake phone number
            'address' => $this->faker->address, // Fake address
            'created_at' => $this->faker->dateTimeBetween('-1 year', 'now'), // Random creation date
            'updated_at' => $this->faker->dateTimeBetween('-1 year', 'now'), // Random update date
        ];
    }
}
