<?php

namespace App\Http\Controllers;

use App\Models\Booking;

class AdminBookingController extends Controller
{
    // List all bookings
    public function index()
    {
        $bookings = Booking::with(['guest', 'bookable'])
            ->orderBy('created_at', 'desc')
            ->get();

        return view('admin.bookings.index', compact('bookings'));
    }

    // Approve booking
    public function approve($id)
    {
        $booking = Booking::with('bookable')->findOrFail($id);

        $booking->booking_status = 'approved';
        $booking->save();

        // Update room status
        if ($booking->bookable) {
            $booking->bookable->status = 'booked';
            $booking->bookable->save();
        }

        return redirect()->back()->with('success', 'Booking approved.');
    }

    // Reject booking
    public function reject($id)
    {
        $booking = Booking::with('bookable')->findOrFail($id);

        $booking->booking_status = 'rejected';
        $booking->save();

        // Make room available again
        if ($booking->bookable) {
            $booking->bookable->status = 'available';
            $booking->bookable->save();
        }

        return redirect()->back()->with('success', 'Booking rejected.');
    }
}
