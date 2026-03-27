<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EventHall;
use App\Models\Booking;
use App\Models\Guest;

class EventHallController extends Controller
{
    // Show all halls
    public function index()
    {
        $halls = EventHall::all();
        return view('event-halls.index', compact('halls'));
    }

    // Show single hall
    public function show($id)
    {
        $hall = EventHall::findOrFail($id);
        return view('event-halls.show', compact('hall'));
    }

    // Show booking form
    public function create($id)
    {
        $hall = EventHall::findOrFail($id);

$date = request('event_date');

if ($date && !$hall->isAvailable($date)) {

    return redirect()->back()->with(
        'error',
        'This hall is already booked on selected date.'
    );

}
        return view('event-halls.book', compact('hall'));
    }

    // Store booking
    public function store(Request $request, $id)
    {
        $hall = EventHall::findOrFail($id);

        $request->validate([
            'event_date'     => 'required|date|after_or_equal:today',
            'guests'         => 'required|integer|min:10|max:' . $hall->max_capacity,
            'guest_name'     => 'required|string|max:255',
            'contact_number' => ['required', 'regex:/^9[0-9]{9}$/'],
            'id_image'       => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Store ID image
        $imagePath = null;

        if ($request->hasFile('id_image')) {
            $imagePath = $request->file('id_image')->store('id_images', 'public');
        }

        // Reuse guest using phone
        $guest = Guest::firstOrCreate(
            ['phone' => $request->contact_number],
            [
                'name'     => $request->guest_name,
                'email'    => uniqid().'@walkin.com',
                'id_image' => $imagePath
            ]
        );

        // Create booking (polymorphic)
        Booking::create([
            'guest_id'      => $guest->id,
            'bookable_type' => EventHall::class,
            'bookable_id'   => $hall->id,
            'check_in'      => $request->event_date,
            'check_out'     => $request->event_date,
            'guests'        => $request->guests,
            'booking_status'=> 'pending',
        ]);

        return redirect()->back()->with('success', 'Event hall booking submitted!');
    }
}