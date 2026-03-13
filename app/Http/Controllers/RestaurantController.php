<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Restaurant;
use App\Models\RestaurantTable;
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
    public function create(Request $request, $restaurantId)
{
    $restaurant = Restaurant::findOrFail($restaurantId);

    $bookingDate = $request->booking_date;
    $bookingTime = $request->booking_time;

    // Load tables for this restaurant
    $tables = RestaurantTable::where('restaurant_id', $restaurantId)
        ->where('status', 'available')
        ->get()
        ->filter(function ($table) use ($bookingDate, $bookingTime) {

            // If date/time not selected yet, show all tables
            if (!$bookingDate || !$bookingTime) {
                return true;
            }

            // Check dynamic availability
            return $table->isAvailable($bookingDate, $bookingTime);
        });

    // Load menu categories with active menu items
    $menuCategories = MenuCategory::with(['menuItems' => function ($query) {
        $query->where('status', 1);
    }])->get();

    return view('restaurant.book', compact(
        'restaurant',
        'tables',
        'menuCategories',
        'bookingDate',
        'bookingTime'
    ));
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
            'table_id'       => 'required|exists:restaurant_tables,id',
        ]);

        /**
         * Create guest
         */
        $guest = Guest::create([
            'name'  => $request->guest_name,
            'phone' => $request->contact_number,
            'email' => null
        ]);

        /**
         * Create booking
         */
        $booking = Booking::create([
            'guest_id'      => $guest->id,
            'bookable_type' => RestaurantTable::class,
            'bookable_id'   => $request->table_id,
            'check_in'      => $request->booking_date,
            'check_out'     => $request->booking_date,
            'guests'        => $request->guests,
            'booking_status'=> 'pending',
        ]);

        /**
         * Save food orders
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

        return redirect()->back()->with(
            'success',
            'Restaurant table booking submitted successfully! Waiting for approval.'
        );
    }
}