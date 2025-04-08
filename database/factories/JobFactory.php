<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\JobListing>
 */
class JobFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::inRandomOrder()->first()->id, // Random user
            'category_id' => Category::inRandomOrder()->first()->id, // Random category
            'title' => $this->faker->jobTitle,
            'description' => $this->faker->text(200),
            'location' => $this->faker->city,
            'job_type' => $this->faker->randomElement(['Full-time', 'Part-time']),
            'min_salary' => $this->faker->numberBetween(50000, 100000),
            'max_salary' => $this->faker->numberBetween(100000, 150000),
            'status' => $this->faker->randomElement(['pending', 'approved', 'rejected']),
            'work_type' => $this->faker->randomElement(['remote', 'onsite', 'hybrid']),
            'created_at' => now(),
            'job_status' => $this->faker->randomElement(['available', 'not available']),
            'slug' => Str::slug($this->faker->jobTitle),

            // Generate technologies as JSON
            'technologies' => json_encode(array_map(function ($tech) {
                return ['value' => $tech];
            }, $this->faker->words(3))),

            'application_deadline' => $this->faker->dateTimeBetween('now', '+3 months')->format('Y-m-d'),
        ];
    }
}
