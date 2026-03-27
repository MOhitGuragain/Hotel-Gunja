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
        'room_plan_id'   => 'required|exists:room_plans,id',
        'check_in'       => 'required|date|after_or_equal:today',
        'check_out'      => 'required|date|after:check_in',
        'guests'         => 'required|integer|min:1|max:' . $category->max_adults,
        'guest_name'     => 'required|string|max:255',
        'contact_number' => ['required', 'regex:/^9[0-9]{9}$/'],
        'id_image'       => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
    ]);

    $imagePath = null;
    if ($request->hasFile('id_image')) {
        $imagePath = $request->file('id_image')->store('id_images', 'public');
    }

    $guest = Guest::firstOrCreate(
        ['phone' => $request->contact_number],
        [
            'name'     => $request->guest_name,
            'email'    => uniqid().'@walkin.com',
            'id_image' => $imagePath
        ]
    );

    $plan = \App\Models\RoomPlan::findOrFail($request->room_plan_id);

    $checkIn  = Carbon::parse($request->check_in);
    $checkOut = Carbon::parse($request->check_out);
    $nights   = $checkIn->diffInDays($checkOut);
    $total    = $plan->price_per_night * max($nights, 1);

    Booking::create([
        'guest_id'        => $guest->id,
        'bookable_type'   => RoomCategory::class,
        'bookable_id'     => $category->id,
        'room_category_id'=> $category->id,
        'room_plan_id'    => $plan->id,
        'check_in'        => $request->check_in,
        'check_out'       => $request->check_out,
        'guests'          => $request->guests,
        'total_price'     => $total,
        'booking_status'  => 'pending',
    ]);

    return back()->with('success', 'Booking submitted! Waiting for approval.');
}
}
