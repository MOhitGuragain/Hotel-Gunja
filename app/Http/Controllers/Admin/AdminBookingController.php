<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Room;
use App\Models\RoomCategory;
use App\Models\RestaurantTable;
use App\Models\EventHall;

class AdminBookingController extends Controller
{

    // List all bookings
    public function index()
    {
        $bookings = Booking::with([
            'guest',
            'room',
            'approvedBy',
            'bookable' => function ($morphTo) {
                $morphTo->morphWith([
                    RoomCategory::class => ['plans'],
                ]);
            }
        ])
        ->latest()
        ->get();

        return view('admin.bookings.index', compact('bookings'));
    }


    // Approve booking
    public function approve($id)
    {
        $booking = Booking::with('bookable')->findOrFail($id);

        // Prevent approving twice
        if ($booking->booking_status === 'approved') {
            return back()->with('error', 'Booking already approved.');
        }

        /*
        |--------------------------------------------------------------------------
        | ROOM CATEGORY BOOKING
        |--------------------------------------------------------------------------
        */

        if ($booking->bookable_type === RoomCategory::class) {

            $room = Room::where('room_category_id', $booking->bookable_id)
                        ->where('status', 'available')
                        ->get()
                        ->first(function ($room) use ($booking) {

                            return $room->isAvailable(
                                $booking->check_in,
                                $booking->check_out
                            );

                        });

            if (!$room) {
                return back()->with(
                    'error',
                    'No available rooms for the selected dates.'
                );
            }

            // Assign room
            $booking->room_id = $room->id;
        }


        /*
        |--------------------------------------------------------------------------
        | RESTAURANT TABLE BOOKING
        |--------------------------------------------------------------------------
        */

        if ($booking->bookable_type === RestaurantTable::class) {

            $table = $booking->bookable;

            if (!$table->isAvailable(
                $booking->check_in,
                $booking->booking_time
            )) {

                return back()->with(
                    'error',
                    'This table is already reserved for that time.'
                );
            }
        }


        /*
        |--------------------------------------------------------------------------
        | EVENT HALL BOOKING
        |--------------------------------------------------------------------------
        */

        if ($booking->bookable_type === EventHall::class) {

            $hall = $booking->bookable;

            if (!$hall->isAvailable($booking->check_in)) {

                return back()->with(
                    'error',
                    'This event hall is already booked for that date.'
                );
            }
        }


        /*
        |--------------------------------------------------------------------------
        | APPROVE BOOKING
        |--------------------------------------------------------------------------
        */

        $booking->booking_status = 'approved';
        $booking->approved_by = auth()->id();
        $booking->save();

        return back()->with('success', 'Booking approved successfully.');
    }


    // Reject booking
    public function reject($id)
    {
        $booking = Booking::with('room')->findOrFail($id);

        // Release assigned room
        if ($booking->room) {

            $booking->room->status = 'available';
            $booking->room->save();

            $booking->room_id = null;
        }

        $booking->booking_status = 'cancelled';
        $booking->approved_by = auth()->id();
        $booking->save();

        return back()->with('success', 'Booking cancelled successfully.');
    }
}