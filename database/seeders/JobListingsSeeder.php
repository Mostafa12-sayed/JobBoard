<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Job;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class JobListingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Job::create([
        //     'user_id' => User::first()->id, // Assumes a user already exists
        //     'category_id' => Category::first()->id, // Assumes a category already exists
        //     'title' => 'Senior Software Engineer',
        //     'description' => 'We are looking for a highly skilled software engineer to join our team.',
        //     'location' => 'New York, NY',
        //     'type' => 'Full-time',
        //     'min_salary' => '100000',
        //     'max_salary' => '150000',
        //     'status' => 'pending',
        //     'slug' => Str::slug('Senior Software Engineer'),
        //     'application_deadline' => '2025-12-31',
        // ]);

        // You can also generate multiple job listings using the factory if you have one.
        \App\Models\Job::factory(100)->create();  // Creates 10 random job listings
    }
}
