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

    // Room plans (pricing options)
    public function plans()
    {
        return $this->hasMany(RoomPlan::class, 'room_category_id');
    }

    // Physical rooms
    public function rooms()
    {
        return $this->hasMany(Room::class, 'room_category_id');
    }

    // Get default plan (first plan)
    public function defaultPlan()
    {
        return $this->hasOne(RoomPlan::class, 'room_category_id')
                    ->orderBy('id');
    }
}