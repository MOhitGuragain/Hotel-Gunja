<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\RoomCategory;

class RoomCategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            'Presidential Suite',
            'Suite',
            'Super Deluxe',
            'Deluxe',
            'Family',
            'Standard',
            'Twin Bed Super Deluxe',
            'Twin Bed Deluxe',
            'Twin Bed Standard',
        ];

        foreach ($categories as $name) {
            RoomCategory::create(['name' => $name]);
        }
    }
}

