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
    return !$this->bookings()
        ->where('booking_status', 'approved')
        ->where(function ($query) use ($checkIn, $checkOut) {

            $query->where('check_in', '<', $checkOut)
                  ->where('check_out', '>', $checkIn);

        })
        ->exists();
}

}
