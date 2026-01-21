<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Room;
use App\Models\Guest;
use Carbon\Carbon;

class GuestBookingController extends Controller
{
    // Show booking page
    public function create($roomId)
    {
        $room = Room::findOrFail($roomId);

        return view('rooms.book', compact('room'));
    }

    // Store a new booking
    public function store(Request $request, $roomId)
    {
        // Find the room
        $room = Room::findOrFail($roomId);

        // Validate request
        $request->validate([
            'check_in'  => 'required|date|after_or_equal:today',
            'check_out' => 'required|date|after:check_in',
            'guests'    => 'required|integer|min:1|max:' . ($room->category ? $room->category->max_adults : 1),
        ]);

        // Convert to Carbon for comparison
        $checkIn  = Carbon::parse($request->check_in);
        $checkOut = Carbon::parse($request->check_out);

        // Check room availability (no overlapping approved bookings)
        $overlap = $room->bookings()
            ->where('booking_status', 'approved')
            ->where(function ($query) use ($checkIn, $checkOut) {
                $query->whereBetween('check_in', [$checkIn, $checkOut])
                      ->orWhereBetween('check_out', [$checkIn, $checkOut])
                      ->orWhere(function ($q) use ($checkIn, $checkOut) {
                          $q->where('check_in', '<=', $checkIn)
                            ->where('check_out', '>=', $checkOut);
                      });
            })
            ->exists();

        if ($overlap) {
            return redirect()->back()->withErrors(['This room is already booked for the selected dates.']);
        }

        // Handle guest: if not logged in, create a walk-in guest
        $guest = Guest::firstOrCreate(
            ['name' => 'Guest'],
            ['email' => 'walkin@example.com', 'phone' => '0000000000']
        );

        // Save booking (status pending)
        $booking = new Booking();
        $booking->guest_id       = $guest->id;
        $booking->bookable_type  = Room::class;
        $booking->bookable_id    = $room->id;
        $booking->check_in       = $checkIn;
        $booking->check_out      = $checkOut;
        $booking->guests         = $request->guests;
        $booking->booking_status = 'pending';
        $booking->save();

        return redirect()->back()->with('success', 'Room booked successfully! Waiting for approval.');
    }
}
