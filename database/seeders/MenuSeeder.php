<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MenuCategory;
use App\Models\MenuItem;

class MenuSeeder extends Seeder
{
    public function run(): void
    {
        $menuData = [
            'Appetizers' => [
                [
                    'name' => 'Chicken Momo',
                    'description' => 'Steamed chicken dumplings',
                    'price' => 180,
                ],
                [
                    'name' => 'French Fries',
                    'description' => 'Crispy potato fries',
                    'price' => 150,
                ],
            ],

            'Main Course' => [
                [
                    'name' => 'Chicken Biryani',
                    'description' => 'Spicy rice with chicken',
                    'price' => 350,
                ],
                [
                    'name' => 'Veg Thali',
                    'description' => 'Nepali traditional set meal',
                    'price' => 300,
                ],
            ],

            'Beverages' => [
                [
                    'name' => 'Coca Cola',
                    'description' => 'Cold soft drink',
                    'price' => 80,
                ],
                [
                    'name' => 'Fresh Lime Soda',
                    'description' => 'Refreshing lime drink',
                    'price' => 120,
                ],
            ],

            'Desserts' => [
                [
                    'name' => 'Chocolate Brownie',
                    'description' => 'Warm chocolate brownie',
                    'price' => 200,
                ],
            ],
        ];

        foreach ($menuData as $categoryName => $items) {

            $category = MenuCategory::firstOrCreate([
                'name' => $categoryName
            ]);

            foreach ($items as $item) {
                MenuItem::create([
                    'menu_category_id' => $category->id,
                    'name' => $item['name'],
                    'description' => $item['description'],
                    'price' => $item['price'],
                    'status' => 'available'   // since your column is status, not is_available
                ]);
            }
        }
    }
}