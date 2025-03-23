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

        // Create applications with specific job_id and user_id
        Applications::factory()->count(40)->create();
    }
}
