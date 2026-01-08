<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EventHall extends Model
{
    protected $fillable = ['name','capacity','price_per_hour','status'];

    public function bookings()
    {
        return $this->morphMany(Booking::class, 'bookable');
    }
}
