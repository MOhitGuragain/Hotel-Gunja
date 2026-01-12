<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;

class AdminBookingController extends Controller
{
    // Show all bookings (ADMIN PANEL)
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
        $booking = Booking::findOrFail($id);
        $booking->booking_status = 'approved';
        $booking->save();

        return redirect()->back()->with('success', 'Booking approved.');
    }

    // Reject booking
    public function reject($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->booking_status = 'rejected';
        $booking->save();

        return redirect()->back()->with('success', 'Booking rejected.');
    }
}
