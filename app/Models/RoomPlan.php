<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RoomPlan extends Model
{
    protected $fillable = [
        'room_category_id','plan_name',
        'price_per_night','extra_bed_price'
    ];

    public function category()
    {
        return $this->belongsTo(RoomCategory::class);
    }
}

