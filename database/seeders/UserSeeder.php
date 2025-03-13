<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User; // Assuming User is the model for the users table

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Using Faker to create 10 users (you can modify the number)
        // \App\Models\User::create([
        //     'name' => 'John Doe',
        //     'email' => 'johndoee@example.com',
        //     'email_verified_at' => now(),
        //     'password' => Hash::make('password'), // Always hash the password
        //     'role' => 'employer',
        //     'phone_number' => '1234567890',
        //     'profile_picture' => 'profile_pic_1.jpg',
        // ]);

        // \App\Models\User::create([
        //     'name' => 'Jane Smith',
        //     'email' => 'janesmithe@example.com',
        //     'email_verified_at' => now(),
        //     'password' => Hash::make('password'),
        //     'role' => 'candidate',
        //     'phone_number' => '0987654321',
        //     'profile_picture' => 'profile_pic_2.jpg',
        // ]);

        // You can also use Faker to generate random data
        \App\Models\User::factory(50)->create(); // This will generate 8 random users
    }
}
