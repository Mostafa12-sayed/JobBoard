<?php

namespace Database\Factories;

use App\Models\Job;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Applications>
 */
class ApplicationsFactory extends Factory
{
    protected $model = \App\Models\Applications::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    
    public function definition(): array
    {
        // Fetch existing job and user IDs
        $job = Job::inRandomOrder()->first() ?? Job::factory()->create();
        $user = User::inRandomOrder()->first() ?? User::factory()->create();

        return [
            'job_id' => $job->id, // Use an existing job ID
            'user_id' => $user->id, // Use an existing user ID
            'status' => $this->faker->randomElement(['pending', 'approved', 'rejected']),
            'message' => $this->faker->paragraph,
            'resume_path' => $this->faker->filePath(),
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'phone' => $this->faker->phoneNumber,
        ];
    }
}
