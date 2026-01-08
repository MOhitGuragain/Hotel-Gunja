<?php

namespace App\Http\Controllers;
use App\Models\Guest;
use App\Models\Booking;

use Illuminate\Http\Request;

class GuestBookingController extends Controller
{
    public function store(Request $request)
    {
        $guest = Guest::create($request->only(
            'name','phone','email','address'
        ));

        Booking::create([
            'guest_id' => $guest->id,
            'bookable_id' => $request->bookable_id,
            'bookable_type' => $request->bookable_type,
            'check_in' => $request->check_in,
            'check_out' => $request->check_out,
            'guests' => $request->guests,
            'booking_status' => 'pending'
        ]);

        return response()->json(['message'=>'Booking submitted']);
    }
}

