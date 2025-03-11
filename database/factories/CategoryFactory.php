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
            'name' => $this->faker->unique()->word, // Random word as category name
            'description' => $this->faker->text(100), // Random text as category description
            'status' => $this->faker->randomElement(['active', 'inactive']), // Random status (active or inactive)
            'slug' =>$this->faker->word, // Slugified category name for URL friendly routing
        ];
    }
}
