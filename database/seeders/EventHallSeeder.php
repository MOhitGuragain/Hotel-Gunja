<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\EventHall;

class EventHallSeeder extends Seeder
{
    public function run(): void
    {
        EventHall::insert([
            [
                'name' => 'Begnas Hall',
                'min_capacity' => 30,
                'max_capacity' => 60,
                'price_per_hour' => 5000,
            ],
            [
                'name' => 'Se Phoksundo Hall',
                'min_capacity' => 60,
                'max_capacity' => 90,
                'price_per_hour' => 7000,
            ],
            [
                'name' => 'Tilicho Hall',
                'min_capacity' => 90,
                'max_capacity' => 120,
                'price_per_hour' => 10000,
            ],
        ]);
    }
}
