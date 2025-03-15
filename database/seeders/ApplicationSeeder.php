<?php

namespace Database\Seeders;

use App\Models\Applications;
use App\Models\Job;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ApplicationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $job = Job::first();
        $user = User::first();

        // Create applications with specific job_id and user_id
        Applications::factory()->count(10)->create([
            'job_id' => $job->id,
            'user_id' => $user->id,
        ]);
    }
}
