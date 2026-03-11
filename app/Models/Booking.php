<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Bill;
use Illuminate\Support\Facades\Auth;

class Booking extends Model
{
    protected $fillable = [
    'guest_id',

    'bookable_type',
    'bookable_id',

    'room_category_id',
    'room_plan_id',

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
    public function bill()
{
    return $this->hasOne(Bill::class);
}

protected static function booted()
{
    static::updated(function ($booking) {

        if (
            $booking->isDirty('booking_status') &&
            $booking->booking_status === 'approved' &&
            !$booking->bill
        ) {

            $bookable = $booking->bookable;
            $total = 0;

            // ROOM BOOKING
            if ($bookable instanceof \App\Models\RoomCategory) {

                $price  = $booking->plan->price_per_night ?? 0;
                $nights = $booking->check_in->diffInDays($booking->check_out);
                $total  = $price * max($nights, 1);

            }

            // EVENT HALL BOOKING
            elseif ($bookable instanceof \App\Models\EventHall) {

                $total = $bookable->price_per_hour;

            }

            // RESTAURANT TABLE BOOKING
            elseif ($bookable instanceof \App\Models\RestaurantTable) {

                // Calculate food total
                $foodTotal = $booking->menuItems->sum(function ($item) {
                    return $item->pivot->price_at_time * $item->pivot->quantity;
                });

                $total = $foodTotal;

                // Mark the table as reserved
                $bookable->status = 'reserved';
                $bookable->save();
            }

            $tax = $total * 0.10;
            $discount = 0;
            $net = $total + $tax - $discount;

            Bill::create([
                'booking_id'   => $booking->id,
                'total_amount' => $total,
                'tax'          => $tax,
                'discount'     => $discount,
                'net_amount'   => $net,
                'status'       => 'unpaid',
                'generated_by' => $booking->approved_by,
            ]);
        }
    });
}
public function plan()
{
    return $this->belongsTo(\App\Models\RoomPlan::class, 'room_plan_id');
}

public function menuItems()
{
    return $this->belongsToMany(MenuItem::class, 'booking_menu_items')
                ->withPivot('quantity', 'price_at_time', 'order_status')
                ->withTimestamps();
}

public function getFoodTotalAttribute()
{
    return $this->menuItems->sum(function ($item) {
        return $item->pivot->price_at_time * $item->pivot->quantity;
    });
}

public function getFinalTotalAttribute()
{
    $roomPrice = $this->total_price ?? 0;

    $foodPrice = $this->food_total;

    return $roomPrice + $foodPrice;
}

}
