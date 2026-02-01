<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Restaurant;

class RestaurantSeeder extends Seeder
{
    public function run(): void
    {
        Restaurant::insert([
            [
                'name' => 'Gunja Dining & Bar',
                'location' => 'Main Building',
                'opening_time' => '07:00',
                'closing_time' => '22:00',
            ],
            [
                'name' => 'Gunja Atomic Bar',
                'location' => 'Rooftop',
                'opening_time' => '16:00',
                'closing_time' => '23:00',
            ],
            [
                'name' => 'Gunja Sattal',
                'location' => 'Courtyard',
                'opening_time' => '06:00',
                'closing_time' => '21:00',
            ],
            [
                'name' => 'Garden Side Restaurant',
                'location' => 'Garden Area',
                'opening_time' => '08:00',
                'closing_time' => '22:00',
            ],
        ]);
    }
}
