<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\RoomCategory;
use App\Models\RoomPlan;

class AdminRoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
   public function index()
    {
        $rooms = Room::with(['category.plans'])->paginate(10);

        return view('admin.rooms.index', compact('rooms'));
    }

    /**
     * Show the form for creating a new resource.
     */
   public function create()
{
    $categories = RoomCategory::all();
    $plans = RoomPlan::all();

    return view('admin.rooms.create', compact('categories', 'plans'));
}

    /**
     * Store a newly created resource in storage.
     */
 public function store(Request $request)
{
    $request->validate([
        'room_number' => 'required|unique:rooms',
        'room_category_id' => 'required|exists:room_categories,id',
        'floor' => 'nullable|integer',
        'status' => 'required|in:available,booked,maintenance',
    ]);

   Room::create([
    'room_number' => $request->room_number,
    'room_category_id' => $request->room_category_id,
    'floor' => $request->floor,
    'status' => $request->status,
]);

    return redirect()->route('admin.rooms.index')
        ->with('success', 'Room created successfully.');
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
