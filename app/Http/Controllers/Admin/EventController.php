<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::orderBy('event_date', 'asc')->paginate(10);
        return view('admin.events.index', compact('events'));
    }

    public function create()
    {
        return view('admin.events.create');
    }

    public function store(Request $request)
    {
        Event::create($request->all());

        return redirect()
            ->route('admin.events.index')
            ->with('success', 'Event created successfully');
    }

    public function destroy($id)
    {
        Event::findOrFail($id)->delete();

        return back()->with('success', 'Event deleted');
    }
}