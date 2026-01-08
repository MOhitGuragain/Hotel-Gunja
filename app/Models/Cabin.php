<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cabin extends Model
{
    protected $fillable = ['name','capacity','price_per_night','status'];

    public function bookings()
    {
        return $this->morphMany(Booking::class, 'bookable');
    }
}

