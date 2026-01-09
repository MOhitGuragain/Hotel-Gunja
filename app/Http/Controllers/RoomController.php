<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;

class RoomController extends Controller
{
    // List available rooms
    public function index()
    {
        $rooms = Room::with('category')->where('status', 'available')->get();
        return view('rooms.index', compact('rooms'));
    }

    // Show single room details
    public function show($id)
    {
        $room = Room::with('category')->findOrFail($id);
        return view('rooms.show', compact('room'));
    }
}
