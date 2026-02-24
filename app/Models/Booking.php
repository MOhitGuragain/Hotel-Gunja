<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'guest_id',
        'guest_name',
        'contact_number',
        'id_image',

        'bookable_type',
        'bookable_id',

        'check_in',
        'check_out',
        'guests',

        'booking_status',
        'approved_by',

        'total_price',
        'room_id'
    ];

    /*
    |--------------------------------------------------------------------------
    | Casts
    |--------------------------------------------------------------------------
    */

    protected $casts = [
        'check_in'  => 'datetime',
        'check_out' => 'datetime',
        'total_price' => 'decimal:2',
    ];

    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    */

    // Guest who made booking
    public function guest()
    {
        return $this->belongsTo(Guest::class);
    }

    // Polymorphic relation (RoomCategory / Restaurant / EventHall)
    public function bookable()
    {
        return $this->morphTo();
    }

    // Assigned room (only for RoomCategory bookings)
    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    // User who approved booking
    public function approvedBy()
    {
        return $this->belongsTo(User::class, 'approved_by');
    }

    /*
    |--------------------------------------------------------------------------
    | Helpers (Optional but Recommended)
    |--------------------------------------------------------------------------
    */

    // Check if booking is approved
    public function isApproved()
    {
        return $this->booking_status === 'approved';
    }

    public function isPending()
    {
        return $this->booking_status === 'pending';
    }

    public function isRejected()
    {
        return $this->booking_status === 'rejected';
    }
}