<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->randomElement([    'Software Development',
            'Marketing',
            'Finance',
            'Human Resources',
            'Sales',
            'Customer Service',
            'IT',
            'Engineering',
            'Design',
            'Writing',
            'Research',
            'Consulting',
            'Management',
            'Operations',
            'Logistics']), // Random word as category name
            'description' => $this->faker->paragraph,  // For category description
            'status' => $this->faker->randomElement(['active', 'inactive']), // Random status (active or inactive)
            'slug' => $this->faker->unique()->slug,
        ];
    }
}
