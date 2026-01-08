<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'guest_id','bookable_id','bookable_type',
        'check_in','check_out','guests',
        'booking_status','approved_by','total_price'
    ];

    public function guest()
    {
        return $this->belongsTo(Guest::class);
    }

    public function bookable()
    {
        return $this->morphTo();
    }

    public function approver()
    {
        return $this->belongsTo(User::class,'approved_by');
    }
}

