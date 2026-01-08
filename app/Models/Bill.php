<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    protected $fillable = [
        'booking_id','total_amount',
        'discount','tax','net_amount','generated_by'
    ];

    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }
}

