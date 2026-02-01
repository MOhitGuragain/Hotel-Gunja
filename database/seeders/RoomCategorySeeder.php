<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\RoomCategory;

class RoomCategorySeeder extends Seeder
{
    public function run(): void
    {
        RoomCategory::insert([
            ['name'=>'Presidential Suite','max_adults'=>4,'max_children'=>2],
            ['name'=>'Suite','max_adults'=>3,'max_children'=>2],
            ['name'=>'Super Deluxe','max_adults'=>3,'max_children'=>2],
            ['name'=>'Deluxe','max_adults'=>2,'max_children'=>1],
            ['name'=>'Family','max_adults'=>4,'max_children'=>2],
            ['name'=>'Standard','max_adults'=>2,'max_children'=>1],
            ['name'=>'Twin Bed Super Deluxe','max_adults'=>4,'max_children'=>2],
            ['name'=>'Twin Bed Deluxe','max_adults'=>3,'max_children'=>2],
            ['name'=>'Twin Bed Standard','max_adults'=>2,'max_children'=>1],
        ]);
    }
}

