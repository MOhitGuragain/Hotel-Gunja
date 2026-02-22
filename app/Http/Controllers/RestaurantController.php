<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Restaurant;
use App\Models\Booking;
use App\Models\Guest;

class RestaurantController extends Controller
{
    /**
     * Show all restaurants
     */
    public function index()
    {
        $restaurants = Restaurant::all();
        return view('restaurant.index', compact('restaurants'));
    }

    /**
     * Show single restaurant details
     */
    public function show($id)
    {
        $restaurant = Restaurant::findOrFail($id);
        return view('restaurant.show', compact('restaurant'));
    }

    /**
     * Show booking page (same pattern as rooms)
     */
    public function create($restaurantId)
    {
        $restaurant = Restaurant::findOrFail($restaurantId);
        return view('restaurant.book', compact('restaurant'));
    }

    /**
     * Store restaurant booking
     */
    public function store(Request $request, $restaurantId)
    {
        $restaurant = Restaurant::findOrFail($restaurantId);

        $request->validate([
            'guest_name'     => 'required|string|max:255',
            'contact_number' => 'required|string|max:20',
            'booking_date'   => 'required|date|after_or_equal:today',
            'booking_time'   => 'required',
            'guests' => 'required|in:2,4,6,8',
        ]);

        // Create or find guest (same as your rooms system)
        $guest = Guest::firstOrCreate(
            ['email' => 'restaurant_walkin@example.com'],
            [
                'name'  => $request->guest_name,
                'phone' => $request->contact_number
            ]
        );

        // Create booking (polymorphic like rooms)
        Booking::create([
            'guest_id'      => $guest->id,
            'bookable_type' => Restaurant::class,
            'bookable_id'   => $restaurant->id,
            'check_in'      => $request->booking_date,
            'check_out'     => $request->booking_date,
            'guests'        => $request->guests,
            'booking_status'=> 'pending',
        ]);

        return back()->with('success', 'Restaurant booking submitted! Waiting for approval.');
    }
}