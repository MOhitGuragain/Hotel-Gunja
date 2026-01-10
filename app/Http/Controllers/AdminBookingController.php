<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;

class AdminBookingController extends Controller
{
    // Show all bookings
    public function index()
    {
        // Eager load guest and bookable (polymorphic) relationships
        $bookings = Booking::with(['guest', 'bookable'])->orderBy('created_at', 'desc')->get();

        return view('admin.bookings.index', compact('bookings'));
    }

    // Approve a booking
    public function approve($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->booking_status = 'approved';
        $booking->save();

        // Mark the room as booked for the period
        if ($booking->bookable) {
            $booking->bookable->status = 'booked';
            $booking->bookable->save();
        }

        return redirect('/admin/bookings')->with('success', 'Booking approved.');
    }

    // Reject a booking
    public function reject($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->booking_status = 'rejected';
        $booking->save();

        return redirect('/admin/bookings')->with('success', 'Booking rejected.');
    }
}
