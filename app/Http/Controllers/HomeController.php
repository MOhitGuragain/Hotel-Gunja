<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Room;
use App\Models\Event;
use App\Models\Restaurant;
use App\Models\EventHall;
use App\Models\GalleryImage;

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

    // Upcoming events
    $events = Event::where('event_date', '>=', now())
        ->orderBy('event_date')
        ->take(3)
        ->get();

    // Restaurants
    $restaurants = Restaurant::latest()->take(4)->get();
    //Event Halls
    $eventHalls = EventHall::latest()->take(4)->get();
        
            
    //Gallery Images
    $galleryImages = GalleryImage::where('is_approved', true)
    ->where('show_on_homepage', true)
    ->latest()
    ->limit(30)
    ->get();

    return view('home', compact(
            'topReviews',
            'featuredRoom',
            'events',
            'restaurants',
            'eventHalls',
            'galleryImages'
        ));
    }
}
