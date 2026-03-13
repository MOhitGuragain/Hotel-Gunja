<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RoomCategory;

class RoomController extends Controller
{
    /**
     * Show all room categories
     * (This replaces listing individual rooms)
     */
public function index(Request $request)
{
    $checkIn  = $request->check_in;
    $checkOut = $request->check_out;

    $categories = RoomCategory::with(['plans','rooms'])->get();

    if ($checkIn && $checkOut) {

        foreach ($categories as $category) {

            $category->available_rooms = $category->rooms->filter(function ($room) use ($checkIn, $checkOut) {

                return $room->isAvailable($checkIn, $checkOut);

            });

        }

    }

    return view('rooms.index', compact(
        'categories',
        'checkIn',
        'checkOut'
    ));
}

    /**
     * Show single room category details
     * (plans + rooms inside that category)
     */
    public function show($id)
    {
        $category = RoomCategory::with([
            'plans',
            'rooms'
        ])->findOrFail($id);

        return view('rooms.show', compact('category'));
    }
}
