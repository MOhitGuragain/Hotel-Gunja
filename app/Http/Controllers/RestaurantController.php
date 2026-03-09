<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Restaurant;
use App\Models\Booking;
use App\Models\Guest;
use App\Models\MenuCategory;
use App\Models\MenuItem;

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
     * Show booking page
     */
    public function create($restaurantId)
    {
        $restaurant = Restaurant::findOrFail($restaurantId);

        // Load menu categories with menu items
        $menuCategories = MenuCategory::with(['menuItems' => function ($query) {
            $query->where('status', 1);
        }])->get();

        return view('restaurant.book', compact('restaurant', 'menuCategories'));
    }

    /**
     * Store restaurant booking + food order
     */
    public function store(Request $request, $restaurantId)
    {
        $restaurant = Restaurant::findOrFail($restaurantId);

        $request->validate([
            'guest_name'     => 'required|string|max:255',
            'contact_number' => 'required|string|max:20',
            'booking_date'   => 'required|date|after_or_equal:today',
            'booking_time'   => 'required',
            'guests'         => 'required|in:2,4,6,8',
        ]);

        // Create or find guest
        $guest = Guest::firstOrCreate(
            ['email' => 'restaurant_walkin@example.com'],
            [
                'name'  => $request->guest_name,
                'phone' => $request->contact_number
            ]
        );

        // Create booking
        $booking = Booking::create([
            'guest_id'      => $guest->id,
            'bookable_type' => Restaurant::class,
            'bookable_id'   => $restaurant->id,
            'check_in'      => $request->booking_date,
            'check_out'     => $request->booking_date,
            'guests'        => $request->guests,
            'booking_status'=> 'pending',
        ]);

        /**
         * Save food orders if selected
         */
        if ($request->has('food_items')) {

            foreach ($request->food_items as $itemId => $qty) {

                if ($qty > 0) {

                    $menuItem = MenuItem::find($itemId);

                    if ($menuItem) {
                        $booking->menuItems()->attach($menuItem->id, [
                            'quantity'      => $qty,
                            'price_at_time' => $menuItem->price,
                            'order_status'  => 'pending'
                        ]);
                    }
                }
            }
        }

        return redirect()->back()->with('success', 'Restaurant booking submitted with food order! Waiting for approval.');
    }
}