<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Booking;
use App\Models\Guest;

class GuestBookingController extends Controller
{
    public function store(Request $request, $id)
    {
        // 1. Find the room
        $room = Room::findOrFail($id);

        // 2. Validate request
        $request->validate([
            'check_in'  => 'required|date|after_or_equal:now',
            'check_out' => 'required|date|after:check_in',
            'guests'    => 'required|integer|min:1|max:' . ($room->category->max_adults ?? 1),
        ]);

        // 3. STEP 7: Check for overlapping bookings
        $hasConflict = Booking::where('bookable_id', $room->id)
            ->where('bookable_type', Room::class)
            ->where(function ($query) use ($request) {
                $query->whereBetween('check_in', [$request->check_in, $request->check_out])
                      ->orWhereBetween('check_out', [$request->check_in, $request->check_out])
                      ->orWhere(function ($q) use ($request) {
                          $q->where('check_in', '<=', $request->check_in)
                            ->where('check_out', '>=', $request->check_out);
                      });
            })
            ->exists();

        if ($hasConflict) {
            return back()->withErrors([
                'This room is already booked for the selected dates.'
            ]);
        }

        // 4. Create guest if none exists
        $guest = Guest::first();

        if (!$guest) {
            $guest = Guest::create([
                'name'  => 'Walk-in Guest',
                'email' => 'guest_' . time() . '@example.com',
                'phone' => '9800000000',
            ]);
        }

        // 5. Create booking (polymorphic)
        Booking::create([
            'guest_id'       => $guest->id,
            'bookable_id'    => $room->id,
            'bookable_type'  => Room::class,
            'check_in'       => $request->check_in,
            'check_out'      => $request->check_out,
            'guests'         => $request->guests,
            'booking_status' => 'pending',
        ]);

        return redirect("/rooms/{$room->id}")
            ->with('success', 'Room booked successfully! Waiting for approval.');
    }
}
