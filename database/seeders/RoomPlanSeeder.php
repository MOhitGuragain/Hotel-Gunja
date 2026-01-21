<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\RoomCategory;
use App\Models\RoomPlan;

class RoomPlanSeeder extends Seeder
{
    public function run(): void
    {
        $plans = [
            'Presidential Suite' => [
                ['plan_name' => 'EP', 'price_per_night' => 20000],
                ['plan_name' => 'CP', 'price_per_night' => 23000],
                ['plan_name' => 'MAP', 'price_per_night' => 26000],
                ['plan_name' => 'AP', 'price_per_night' => 29000],
            ],
            'Suite' => [
                ['plan_name' => 'EP', 'price_per_night' => 15000],
                ['plan_name' => 'CP', 'price_per_night' => 17500],
                ['plan_name' => 'MAP', 'price_per_night' => 20000],
                ['plan_name' => 'AP', 'price_per_night' => 22500],
            ],
            'Deluxe' => [
                ['plan_name' => 'EP', 'price_per_night' => 4500],
                ['plan_name' => 'CP', 'price_per_night' => 5200],
                ['plan_name' => 'MAP', 'price_per_night' => 6200],
                ['plan_name' => 'AP', 'price_per_night' => 7200],
            ],
            'Standard' => [
                ['plan_name' => 'EP', 'price_per_night' => 3000],
                ['plan_name' => 'CP', 'price_per_night' => 3600],
                ['plan_name' => 'MAP', 'price_per_night' => 4600],
                ['plan_name' => 'AP', 'price_per_night' => 5600],
            ],
        ];

        foreach ($plans as $categoryName => $planList) {
            $category = RoomCategory::where('name', $categoryName)->first();

            foreach ($planList as $plan) {
                RoomPlan::create([
                    'room_category_id' => $category->id,
                    'plan_name' => $plan['plan_name'],
                    'price_per_night' => $plan['price_per_night'],
                ]);
            }
        }
    }
}

