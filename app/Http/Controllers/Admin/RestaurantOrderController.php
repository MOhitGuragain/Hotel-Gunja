<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\MenuItem;
use Illuminate\Http\Request;

class RestaurantOrderController extends Controller
{

    public function create($bookingId)
    {
        $booking = Booking::findOrFail($bookingId);

        $menuItems = MenuItem::where('status',1)->get();

        return view('admin.orders.create', compact('booking','menuItems'));
    }

    public function store(Request $request, $bookingId)
{
    $booking = Booking::findOrFail($bookingId);

    foreach ($request->items as $itemId => $qty) {

        if ($qty > 0) {

            $menuItem = MenuItem::findOrFail($itemId);

            $booking->menuItems()->syncWithoutDetaching([
                $menuItem->id => [
                    'quantity' => $qty,
                    'price_at_time' => $menuItem->price,
                    'order_status' => 'pending'
                ]
            ]);

        }
    }

    return redirect()->route('admin.bookings.index')
    ->with('success','Food added successfully.');
}
}
