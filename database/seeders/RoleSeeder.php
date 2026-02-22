<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        Role::insert([
            ['id' => 1, 'name' => 'Admin'],
            ['id' => 2, 'name' => 'Receptionist'],
            ['id' => 3, 'name' => 'Cashier'],
            ['id' => 4, 'name' => 'Guest'],
        ]);
    }
}

