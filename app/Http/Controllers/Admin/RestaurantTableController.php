<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RestaurantTable;
use App\Models\Restaurant;

class RestaurantTableController extends Controller
{

    public function index()
    {
        $tables = RestaurantTable::with('restaurant', 'bookings')->latest()->get();

        return view('admin.restaurant_tables.index', compact('tables'));
    }


    public function create()
    {
        $restaurants = Restaurant::all();

        return view('admin.restaurant_tables.create', compact('restaurants'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'restaurant_id' => 'required|exists:restaurants,id',
            'table_number'  => 'required|string|max:50',
            'capacity'      => 'required|in:2,4,6,8',
            'status'        => 'required'
        ]);

        RestaurantTable::create($request->all());

        return redirect()
            ->route('admin.restaurant-tables.index')
            ->with('success','Restaurant table added successfully');
    }


    public function edit($id)
    {
        $table = RestaurantTable::findOrFail($id);
        $restaurants = Restaurant::all();

        return view('admin.restaurant_tables.edit', compact('table','restaurants'));
    }


    public function update(Request $request, $id)
    {
        $table = RestaurantTable::findOrFail($id);

        $request->validate([
            'restaurant_id' => 'required|exists:restaurants,id',
            'table_number'  => 'required|string|max:50',
            'capacity'      => 'required|in:2,4,6,8',
            'status'        => 'required'
        ]);

        $table->update($request->all());

        return redirect()
            ->route('admin.restaurant-tables.index')
            ->with('success','Restaurant table updated successfully');
    }

}