<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RoomCategory extends Model
{
    protected $fillable = [
        'name',
        'description',
        'base_price',
        'max_adults',
        'max_children'
    ];
public function plans()
    {
        return $this->hasMany(RoomPlan::class, 'room_category_id');
    }
    public function rooms()
    {
        return $this->hasMany(Room::class, 'room_category_id');
    }
}
