<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RoomCategory;
use App\Models\Booking;
use App\Models\Guest;
use Carbon\Carbon;

class GuestBookingController extends Controller
{
    /**
     * Show booking page (CATEGORY BASED)
     */
    public function create($categoryId)
    {
        $category = RoomCategory::with('plans')->findOrFail($categoryId);

        return view('rooms.book', compact('category'));
    }

    /**
     * Store booking
     */
    public function store(Request $request, $categoryId)
    {
        $category = RoomCategory::findOrFail($categoryId);

        $request->validate([
            'room_plan_id' => 'required|exists:room_plans,id',
            'check_in'     => 'required|date|after_or_equal:today',
            'check_out'    => 'required|date|after:check_in',
            'guests'       => 'required|integer|min:1|max:' . $category->max_adults,
        ]);

        $guest = Guest::firstOrCreate(
            ['email' => 'walkin@example.com'],
            ['name' => 'Walk-in Guest', 'phone' => '0000000000']
        );

        Booking::create([
            'guest_id'      => $guest->id,
            'bookable_type' => RoomCategory::class,
            'bookable_id'   => $category->id,
            'room_plan_id'  => $request->room_plan_id,
            'check_in'      => $request->check_in,
            'check_out'     => $request->check_out,
            'guests'        => $request->guests,
            'booking_status'=> 'pending',
        ]);

        return back()->with('success', 'Booking submitted! Waiting for approval.');
    }
}
