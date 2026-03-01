<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Room;
use App\Models\RoomCategory;

class AdminBookingController extends Controller
{
    // List all bookingsuse App\Models\RoomCategory;

public function index()
{
    $bookings = Booking::with([
        'guest',
        'room',
        'approvedBy',
        'bookable' => function ($morphTo) {
            $morphTo->morphWith([
                RoomCategory::class => ['plans'], // Only RoomCategory has plans
            ]);
        }
    ])
    ->latest()
    ->get();

    return view('admin.bookings.index', compact('bookings'));
}

    // Approve booking
    public function approve($id)
    {
        $booking = Booking::with('bookable')->findOrFail($id);

        // If already approved, stop
        if ($booking->booking_status === 'approved') {
            return back()->with('error', 'Booking already approved.');
        }

        // Only assign room if booking is RoomCategory
        if ($booking->bookable_type === 'App\Models\RoomCategory') {

            $room = Room::where('room_category_id', $booking->bookable_id)
                        ->where('status', 'available')
                        ->first();

            if (!$room) {
                return back()->with('error', 'No available rooms in this category.');
            }

            // Assign room
            $booking->room_id = $room->id;

            // Mark room occupied
            $room->status = 'booked';
            $room->save();
        }

        $booking->booking_status = 'approved';
        $booking->approved_by = auth()->id();
        $booking->save();

        return back()->with('success', 'Booking approved successfully.');
    }

    // Reject booking
    public function reject($id)
    {
        $booking = Booking::with('room')->findOrFail($id);

        // If room was assigned before rejecting
        if ($booking->room) {
            $booking->room->status = 'available';
            $booking->room->save();

            $booking->room_id = null;
        }

        $booking->booking_status = 'rejected';
        $booking->approved_by = auth()->id();
        $booking->save();

        return back()->with('success', 'Booking rejected successfully.');
    }
}