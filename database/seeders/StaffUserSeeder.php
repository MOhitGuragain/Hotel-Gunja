<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class StaffUserSeeder extends Seeder
{
    public function run(): void
    {
        User::insert([
            [
                'name' => 'Admin User',
                'email' => 'admin@example.com',
                'password' => Hash::make('password123'),
                'role_id' => 1, // Admin
            ],
            [
                'name' => 'Receptionist User',
                'email' => 'reception@example.com',
                'password' => Hash::make('password123'),
                'role_id' => 2, // Receptionist
            ],
            [
                'name' => 'Cashier User',
                'email' => 'cashier@example.com',
                'password' => Hash::make('password123'),
                'role_id' => 3, // Cashier
            ],
        ]);
    }
}