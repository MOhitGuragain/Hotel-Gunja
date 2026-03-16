<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RoomCategory;
use Illuminate\Support\Facades\DB;

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

     // Load room categories with plans and rooms
    $categories = RoomCategory::with(['plans','rooms'])->get();

    // Load homepage images
    $homepageImages = \DB::table('homepage_images')
        ->pluck('image', 'section');

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
        'checkOut',
        'homepageImages'
    ));
}

    /**
     * Show a specific room category
     */
   public function show(Request $request, $id)
{
    $checkIn  = $request->check_in;
    $checkOut = $request->check_out;

    // Get room category with plans and rooms
    $category = RoomCategory::with(['plans','rooms'])->findOrFail($id);

    // Load homepage images
        $homepageImages = DB::table('homepage_images')
            ->pluck('image', 'section');

    if ($checkIn && $checkOut) {

        $category->available_rooms = $category->rooms->filter(function ($room) use ($checkIn, $checkOut) {

            return $room->isAvailable($checkIn, $checkOut);

        });

    }

    return view('rooms.show', compact(
        'category',
        'checkIn',
        'checkOut',
        'homepageImages'
    ));
}
}
