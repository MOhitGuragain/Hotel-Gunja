<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use Carbon\Carbon;

class RoomController extends Controller
{
    // List currently available rooms (date-aware)
    public function index()
    {
        $now = Carbon::now();

        $rooms = Room::with('category')
            ->whereDoesntHave('bookings', function ($query) use ($now) {
                $query->where('check_in', '<=', $now)
                      ->where('check_out', '>=', $now);
            })
            ->get();

        return view('rooms.index', compact('rooms'));
    }

    // Show single room details
    public function show($id)
    {
        $room = Room::with('category')->findOrFail($id);
        return view('rooms.show', compact('room'));
    }
}
