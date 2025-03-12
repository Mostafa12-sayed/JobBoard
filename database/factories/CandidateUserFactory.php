<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\CandidateUser;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CandidateUser>
 */
class CandidateUserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = CandidateUser::class;
    public function definition(): array
    {

        $user = User::where('role', 'candidate')->inRandomOrder()->first();

        // If no candidate user exists, create one
        if (!$user) {
            $user = User::factory()->create(['role' => 'candidate']);
        }


        return [
            'user_id' => $user->id, // Create a User and use its ID
            'resume' => $this->faker->url, // Fake resume URL
            'linkedin_profile' => $this->faker->url, // Fake LinkedIn profile URL
            'github_profile' => $this->faker->url, // Fake GitHub profile URL
            'portfolio_website' => $this->faker->url, // Fake portfolio website URL
            'skills' => implode(', ', $this->faker->words(5)), // Fake skills (comma-separated)
            'education' => $this->faker->sentence, // Fake education details
            'experience' => $this->faker->paragraph, // Fake experience details
            'languages' => implode(', ', $this->faker->words(3)), // Fake languages (comma-separated)
            'interests' => implode(', ', $this->faker->words(4)), // Fake interests (comma-separated)
            'cover_letter' => $this->faker->paragraph, // Fake cover letter
            'created_at' => $this->faker->dateTimeBetween('-1 year', 'now'), // Random creation date
            'updated_at' => $this->faker->dateTimeBetween('-1 year', 'now'), // Random update date
        ];
    }
}
