<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RestaurantTable extends Model
{

    protected $fillable = [
        'restaurant_id',
        'table_number',
        'capacity',
        'status'
    ];


    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }


    public function bookings()
    {
        return $this->hasMany(Booking::class,'bookable_id')
            ->where('bookable_type',self::class);
    }


    public function isAvailable($date,$slotId)
    {

        return !$this->bookings()

            ->where('booking_status','approved')

            ->whereDate('check_in',$date)

            ->where('time_slot_id',$slotId)

            ->exists();

    }

}