<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Room;
use App\Models\RoomCategory;

class RoomSeeder extends Seeder
{
    public function run(): void
    {
        $distribution = [
            'Presidential Suite' => 2,
            'Suite' => 4,
            'Super Deluxe' => 6,
            'Deluxe' => 8,
            'Family' => 6,
            'Standard' => 6,
            'Twin Bed Super Deluxe' => 2,
            'Twin Bed Deluxe' => 2,
            'Twin Bed Standard' => 2,
        ];

        $roomNumber = 101;

        foreach ($distribution as $categoryName => $count) {
            $category = RoomCategory::where('name', $categoryName)->first();

            for ($i = 0; $i < $count; $i++) {
                Room::create([
                    'room_number' => $roomNumber++,
                    'room_category_id' => $category->id,
                    'status' => 'available',
                ]);
            }
        }
    }
}

