<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TimeSlot;

class TimeSlotSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        TimeSlot::insert([

            // RESTAURANT 1
            ['restaurant_id'=>1,'start_time'=>'07:00:00','end_time'=>'08:30:00','duration'=>90],
            ['restaurant_id'=>1,'start_time'=>'08:30:00','end_time'=>'10:00:00','duration'=>90],
            ['restaurant_id'=>1,'start_time'=>'10:00:00','end_time'=>'11:30:00','duration'=>90],
            ['restaurant_id'=>1,'start_time'=>'11:30:00','end_time'=>'13:00:00','duration'=>90],
            ['restaurant_id'=>1,'start_time'=>'13:00:00','end_time'=>'14:30:00','duration'=>90],
            ['restaurant_id'=>1,'start_time'=>'14:30:00','end_time'=>'16:00:00','duration'=>90],
            ['restaurant_id'=>1,'start_time'=>'16:00:00','end_time'=>'17:30:00','duration'=>90],
            ['restaurant_id'=>1,'start_time'=>'17:30:00','end_time'=>'19:00:00','duration'=>90],
            ['restaurant_id'=>1,'start_time'=>'19:00:00','end_time'=>'20:30:00','duration'=>90],
            ['restaurant_id'=>1,'start_time'=>'20:30:00','end_time'=>'22:00:00','duration'=>90],

            // RESTAURANT 2
            ['restaurant_id'=>2,'start_time'=>'16:00:00','end_time'=>'17:30:00','duration'=>90],
            ['restaurant_id'=>2,'start_time'=>'17:30:00','end_time'=>'19:00:00','duration'=>90],
            ['restaurant_id'=>2,'start_time'=>'19:00:00','end_time'=>'20:30:00','duration'=>90],
            ['restaurant_id'=>2,'start_time'=>'20:30:00','end_time'=>'22:00:00','duration'=>90],
            ['restaurant_id'=>2,'start_time'=>'22:00:00','end_time'=>'23:00:00','duration'=>60],

            // RESTAURANT 3
            ['restaurant_id'=>3,'start_time'=>'06:00:00','end_time'=>'07:30:00','duration'=>90],
            ['restaurant_id'=>3,'start_time'=>'07:30:00','end_time'=>'09:00:00','duration'=>90],
            ['restaurant_id'=>3,'start_time'=>'09:00:00','end_time'=>'10:30:00','duration'=>90],
            ['restaurant_id'=>3,'start_time'=>'10:30:00','end_time'=>'12:00:00','duration'=>90],
            ['restaurant_id'=>3,'start_time'=>'12:00:00','end_time'=>'13:30:00','duration'=>90],
            ['restaurant_id'=>3,'start_time'=>'13:30:00','end_time'=>'15:00:00','duration'=>90],
            ['restaurant_id'=>3,'start_time'=>'15:00:00','end_time'=>'16:30:00','duration'=>90],
            ['restaurant_id'=>3,'start_time'=>'16:30:00','end_time'=>'18:00:00','duration'=>90],
            ['restaurant_id'=>3,'start_time'=>'18:00:00','end_time'=>'19:30:00','duration'=>90],
            ['restaurant_id'=>3,'start_time'=>'19:30:00','end_time'=>'21:00:00','duration'=>90],

            // RESTAURANT 4
            ['restaurant_id'=>4,'start_time'=>'08:00:00','end_time'=>'09:30:00','duration'=>90],
            ['restaurant_id'=>4,'start_time'=>'09:30:00','end_time'=>'11:00:00','duration'=>90],
            ['restaurant_id'=>4,'start_time'=>'11:00:00','end_time'=>'12:30:00','duration'=>90],
            ['restaurant_id'=>4,'start_time'=>'12:30:00','end_time'=>'14:00:00','duration'=>90],
            ['restaurant_id'=>4,'start_time'=>'14:00:00','end_time'=>'15:30:00','duration'=>90],
            ['restaurant_id'=>4,'start_time'=>'15:30:00','end_time'=>'17:00:00','duration'=>90],
            ['restaurant_id'=>4,'start_time'=>'17:00:00','end_time'=>'18:30:00','duration'=>90],
            ['restaurant_id'=>4,'start_time'=>'18:30:00','end_time'=>'20:00:00','duration'=>90],
            ['restaurant_id'=>4,'start_time'=>'20:00:00','end_time'=>'21:30:00','duration'=>90],

        ]);
    }
}