<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MenuItem extends Model {
    protected $fillable = [
        'name',
        'description',
        'price',
        'menu_category_id'
    ];
    public function category()
{
    return $this->belongsTo(MenuCategory::class, 'menu_category_id');
}

public function bookings()
{
    return $this->belongsToMany(Booking::class, 'booking_menu_items')
                ->withPivot('quantity', 'price_at_time', 'order_status')
                ->withTimestamps();
}
}
