<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Booking;
class RestaurantTable extends Model
{
    protected $fillable = ['restaurant_id','table_number','capacity','status'];

    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }

    public function bookings()
    {
        return $this->morphMany(Booking::class, 'bookable');
    }

public function isAvailable($date, $time)
{
    return !Booking::isBooked(
        self::class,
        $this->id,
        $date,
        $time
    );
}

}

