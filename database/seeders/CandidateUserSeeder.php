<?php

namespace Database\Seeders;

use App\Models\CandidateUser;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CandidateUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CandidateUser::factory()->count(15)->create();
    }
}
