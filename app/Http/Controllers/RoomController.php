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

    // Show  room details
    public function show($id)
{
    $rooms = [
        1 => [
            'name' => 'Presidential Suite',
            'price' => '15000',
            'img' => 'https://images.unsplash.com/photo-1591088398332-8a7791972843?w=1600',
            'guests' => '4 Guests',
            'size' => '1200 sq ft',
            'description' => 'A lavish presidential suite offering unmatched comfort, elegance, and panoramic views.',
            'amenities' => ['King Bed', 'Jacuzzi', 'Private Balcony', 'Mini Bar', 'Wi-Fi'],
        ],
        2 => [
            'name' => 'Suite',
            'price' => '8000',
            'img' => 'https://images.unsplash.com/photo-1590490360182-c33d57733427?w=1600',
            'guests' => '3 Guests',
            'size' => '800 sq ft',
            'description' => 'Spacious suite designed for luxury stays with refined interiors.',
            'amenities' => ['Queen Bed', 'City View', 'Wi-Fi', 'Mini Bar'],
        ],
    ];

    abort_unless(isset($rooms[$id]), 404);

    return view('rooms.show', [
        'room' => $rooms[$id],
    ]);
}



}
