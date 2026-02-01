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

        // Load categories with their plans & rooms
        $categories = RoomCategory::with([
            'plans',
            'rooms'
        ])->get();

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
