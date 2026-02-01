<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'role_id' => 1, // Admin
            'email_verified_at' => now(),
        ]);

        User::create([
            'name' => 'Test Guest',
            'email' => 'guest@example.com',
            'password' => Hash::make('password'),
            'role_id' => 4, // Guest
            'email_verified_at' => now(),
        ]);
    }
}
