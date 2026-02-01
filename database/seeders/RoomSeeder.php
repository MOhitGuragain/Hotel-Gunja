<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Room;
use App\Models\RoomCategory;

class RoomSeeder extends Seeder
{
    public function run(): void
    {
        $rooms = [];

        for ($i = 1; $i <= 38; $i++) {
            $rooms[] = [
                'room_number' => 'R' . str_pad($i, 3, '0', STR_PAD_LEFT),
                'room_category_id' => ($i % 9) + 1,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        Room::insert($rooms);
    }
}

