<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Room;
use App\Models\Event;

class HomeController extends Controller
{
    public function index()
    {
        // Get top reviews
        $topReviews = Review::where('status', 'approved')
            ->where('rating', '>=', 4.5)
            ->orderByDesc('rating')
            ->latest()
            ->take(4)
            ->get();

        // Get a featured room 
        $featuredRoom = Room::first();

        
        //upcoming events
        $events = Event::where('event_date', '>=', now())
        ->orderBy('event_date')
        ->take(3)
        ->get();
        
        return view('home', compact('topReviews', 'featuredRoom' , 'events'));
    }
}
