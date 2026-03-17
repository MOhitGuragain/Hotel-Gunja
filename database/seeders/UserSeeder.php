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
            'email' => 'admin@gunja.com',
            'password' => Hash::make('gunja@admin123'),
            'role_id' => 1, // Admin
            'email_verified_at' => now(),
        ]);

        User::create([
            'name' => 'Test Guest',
            'email' => 'guest@gunja.com',
            'password' => Hash::make('gunja@guest123'),
            'role_id' => 4, // Guest
            'email_verified_at' => now(),
        ]);

        User::create([
            'name' => 'Receptionist User',
            'email' => 'receptionist@gunja.com',
            'password' => Hash::make('gunja@receptionist123'),
            'role_id' => 2, // Receptionist
            'email_verified_at' => now(),
        ]);

        User::create([
            'name' => 'Cashier User',
            'email' => 'cashier@gunja.com',
            'password' => Hash::make('gunja@cashier123'),
            'role_id' => 3, // Cashier
            'email_verified_at' => now(),
        ]);
    }
}
