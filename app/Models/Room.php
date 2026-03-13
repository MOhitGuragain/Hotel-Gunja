<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable = [
        'room_number',
        'room_category_id',
        'floor',
        'status'
    ];

    public function category()
    {
        return $this->belongsTo(RoomCategory::class, 'room_category_id');
    }

   public function bookings()
{
    return $this->hasMany(Booking::class);
}
public function plan()
{
    return $this->belongsTo(RoomPlan::class);
}

public function isAvailable($checkIn, $checkOut)
{
    return !Booking::where('room_id', $this->id)
        ->where('booking_status', 'approved')
        ->where(function ($query) use ($checkIn, $checkOut) {

            $query->whereBetween('check_in', [$checkIn, $checkOut])
                  ->orWhereBetween('check_out', [$checkIn, $checkOut]);

        })
        ->exists();
}

}
