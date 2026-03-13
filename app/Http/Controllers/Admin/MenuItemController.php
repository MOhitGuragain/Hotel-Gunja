<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MenuItem;
use App\Models\MenuCategory;

class MenuItemController extends Controller
{

    public function index()
    {
        $items = MenuItem::with('category')->latest()->get();

        return view('admin.menu_items.index', compact('items'));
    }


    public function create()
    {
        $categories = MenuCategory::all();

        return view('admin.menu_items.create', compact('categories'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'menu_category_id' => 'required',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'status' => 'required'
        ]);

        MenuItem::create($request->all());

        return redirect()
            ->route('admin.menu-items.index')
            ->with('success','Food item added successfully');
    }


    public function edit($id)
    {
        $item = MenuItem::findOrFail($id);
        $categories = MenuCategory::all();

        return view('admin.menu_items.edit', compact('item','categories'));
    }


    public function update(Request $request, $id)
    {
        $item = MenuItem::findOrFail($id);

        $request->validate([
            'menu_category_id' => 'required',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'status' => 'required'
        ]);

        $item->update($request->all());

        return redirect()
            ->route('admin.menu-items.index')
            ->with('success','Food item updated successfully');
    }

}