<?php

namespace Database\Seeders;
use App\Models\User;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@admin.com',
            'password' => bcrypt('12345678'), // Hashed password
            // 'is_admin' => true, // You might have an 'is_admin' field in your users table
        ]);

    }
}
