<?php

namespace Database\Seeders;

use App\Models\EmployeeUser;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmployeeUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        EmployeeUser::factory()->count(15)->create();
    }
}
