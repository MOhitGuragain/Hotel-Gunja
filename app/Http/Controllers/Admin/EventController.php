<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        $request->validate([
            'title'=>'required',
            'description'=>'required',
            'event_date'=>'required|date',
            'image'=>'nullable|image'
        ]);

        $imagePath = null;

        if($request->hasFile('image')){
            $imagePath = $request->file('image')->store('events','public');
        }

        Event::create([
            'title'=>$request->title,
            'description'=>$request->description,
            'event_date'=>$request->event_date,
            'event_time'=>$request->event_time,
            'location'=>$request->location,
            'image'=>$imagePath,
            'is_approved'=>false
        ]);

        return redirect()
            ->route('admin.events.index')
            ->with('success', 'Event created successfully');
    }

    public function approve($id)
    {
        $event = Event::findOrFail($id);

        $event->update([
            'is_approved'=>true
        ]);

        return redirect()->back()->with('success','Event approved');
    }

    public function destroy($id)
    {
        $event = Event::findOrFail($id);

        if($event->image){
            Storage::disk('public')->delete($event->image);
        }

        $event->delete();

        return back()->with('success', 'Event deleted');
    }
}