<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Restaurant;
use App\Models\RestaurantTable;

class RestaurantTableSeeder extends Seeder
{
    public function run(): void
    {
        $restaurants = Restaurant::all();

        foreach ($restaurants as $restaurant) {

            if ($restaurant->name === 'Gunja Dining & Bar') {
                $tables = [
                    ['8', 8, 2],
                    ['4', 4, 4],
                    ['3', 3, 1],
                    ['2', 2, 1],
                ];
            }

            elseif ($restaurant->name === 'Gunja Atomic Bar') {
                $tables = [
                    ['6', 6, 2],
                    ['4', 4, 5],
                ];
            }

            elseif ($restaurant->name === 'Gunja Sattal') {
                $tables = [
                    ['2', 2, 2],
                    ['4', 4, 3],
                    ['6', 6, 1],
                ];
            }

            else { // Garden Side
                $tables = [
                    ['6', 6, 6],
                ];
            }

            $count = 1;

            foreach ($tables as [$label, $capacity, $quantity]) {
                for ($i = 0; $i < $quantity; $i++) {
                    RestaurantTable::create([
                        'restaurant_id' => $restaurant->id,
                        'table_number' => strtoupper($label) . '-' . $count++,
                        'capacity' => $capacity,
                    ]);
                }
            }
        }
    }
}
