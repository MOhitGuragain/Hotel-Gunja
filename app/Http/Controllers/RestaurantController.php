<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Restaurant;
use App\Models\RestaurantTable;
use App\Models\Booking;
use App\Models\Guest;
use App\Models\MenuCategory;
use App\Models\MenuItem;
use App\Models\TimeSlot;

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
     * Show single restaurant
     */
    public function show(Request $request, $id)
    {
        $restaurant = Restaurant::with(['tables','timeSlots'])->findOrFail($id);

        $bookingDate = $request->booking_date;
        $slotId = $request->time_slot_id;

        $availableTables = collect();

        if ($bookingDate && $slotId) {

            $availableTables = $restaurant->tables
                ->where('status','available')
                ->filter(function ($table) use ($bookingDate,$slotId) {

                    return $table->isAvailable($bookingDate,$slotId);

                });

            $restaurant->available_tables = $availableTables;
        }

        return view('restaurant.show', compact('restaurant'));
    }


    /**
     * Show reservation page
     */
    public function create(Request $request, $restaurantId)
    {

        $restaurant = Restaurant::findOrFail($restaurantId);

        $bookingDate = $request->booking_date;
        $slotId = $request->time_slot_id;

        $timeSlot = TimeSlot::find($slotId);

        $tables = RestaurantTable::where('restaurant_id',$restaurantId)
            ->where('status','available')
            ->get()
            ->filter(function ($table) use ($bookingDate,$slotId){

                if(!$bookingDate || !$slotId){
                    return true;
                }

                return $table->isAvailable($bookingDate,$slotId);

            });

        $menuCategories = MenuCategory::with(['menuItems' => function($q){
            $q->where('status',1);
        }])->get();

        return view('restaurant.book',compact(
            'restaurant',
            'tables',
            'menuCategories',
            'bookingDate',
            'timeSlot'
        ));
    }



    /**
     * Store booking
     */
    public function store(Request $request,$restaurantId)
    {

        $restaurant = Restaurant::findOrFail($restaurantId);

        $request->validate([
            'guest_name'     => 'required|string|max:255',
            'contact_number' => ['required', 'regex:/^9[0-9]{9}$/'],
            'booking_date'   => 'required|date|after_or_equal:today',
            'guests'         => 'required|in:2,4,6,8',
            'table_id'       => 'required|exists:restaurant_tables,id',
            'time_slot_id'   => 'required|exists:time_slots,id'
        ]);



        /*
        |--------------------------------
        | CREATE GUEST
        |--------------------------------
        */

        $guest = Guest::create([
            'name'  => $request->guest_name,
            'phone' => $request->contact_number,
            'email' => null
        ]);



        /*
        |--------------------------------
        | CREATE BOOKING
        |--------------------------------
        */

        $booking = Booking::create([

            'guest_id'      => $guest->id,

            'bookable_type' => RestaurantTable::class,
            'bookable_id'   => $request->table_id,

            'check_in'      => $request->booking_date,
            'check_out'     => $request->booking_date,

            'time_slot_id'  => $request->time_slot_id,

            'guests'        => $request->guests,

            'booking_status'=> 'pending'

        ]);



        /*
        |--------------------------------
        | SAVE FOOD ORDERS
        |--------------------------------
        */

        if($request->has('food_items')){

            foreach($request->food_items as $itemId => $qty){

                if($qty > 0){

                    $menuItem = MenuItem::find($itemId);

                    if($menuItem){

                        $booking->menuItems()->attach($menuItem->id,[

                            'quantity'      => $qty,
                            'price_at_time' => $menuItem->price,
                            'order_status'  => 'pending'

                        ]);

                    }

                }

            }

        }


        return redirect()
            ->route('restaurant.show',$restaurant->id)
            ->with('success','Table reservation submitted. Waiting for approval.');

    }

}