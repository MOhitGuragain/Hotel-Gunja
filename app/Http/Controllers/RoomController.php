<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;

class RoomController extends Controller
{
    // List available rooms based on selected dates (REAL LOGIC)
    public function index(Request $request)
    {
        $checkIn  = $request->check_in;
        $checkOut = $request->check_out;

        $rooms = Room::with('category')
            ->when($checkIn && $checkOut, function ($query) use ($checkIn, $checkOut) {
                $query->whereDoesntHave('bookings', function ($q) use ($checkIn, $checkOut) {
                    $q->where('booking_status', 'approved')
                      ->where(function ($overlap) use ($checkIn, $checkOut) {
                          $overlap->whereBetween('check_in', [$checkIn, $checkOut])
                                  ->orWhereBetween('check_out', [$checkIn, $checkOut])
                                  ->orWhere(function ($full) use ($checkIn, $checkOut) {
                                      $full->where('check_in', '<=', $checkIn)
                                           ->where('check_out', '>=', $checkOut);
                                  });
                      });
                });
            })
            ->get();

        return view('rooms.index', compact('rooms', 'checkIn', 'checkOut'));
    }

    // Show single room details
    public function show($id)
    {
        $room = Room::with('category')->findOrFail($id);
        return view('rooms.show', compact('room'));
    }
}
