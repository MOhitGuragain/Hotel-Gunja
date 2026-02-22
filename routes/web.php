<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\GuestBookingController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\AdminBookingController;
use App\Http\Controllers\Admin\ReviewController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\RestaurantController;

// Home page
Route::get('/', [HomeController::class, 'index'])->name('home');

// Rooms listing
Route::get('/rooms', [RoomController::class, 'index'])
    ->name('rooms.index');

// Book a room
Route::get('/rooms/{id}/book', [GuestBookingController::class, 'create'])
    ->name('rooms.book');

Route::post('/rooms/{id}/book', [GuestBookingController::class, 'store'])
    ->name('rooms.book.store');

// Show room details
Route::get('/rooms/{id}', [RoomController::class, 'show'])
    ->name('rooms.show');

// 360 tour
Route::get('/360-tour', function () {
    return view('pages.360tour');
});

// Reviews
Route::get('/reviews', [ReviewController::class, 'index'])
    ->name('admin.reviews.index');

Route::get('/reviews/create', [ReviewController::class, 'create'])
    ->name('admin.reviews.create');

Route::post('/reviews', [ReviewController::class, 'store'])
    ->name('admin.reviews.store');

Route::post('/reviews/{id}/approve', [ReviewController::class, 'approve'])
    ->name('admin.reviews.approve');

Route::post('/reviews/{id}/reject', [ReviewController::class, 'reject'])
    ->name('admin.reviews.reject');

Route::delete('/reviews/{review}', [ReviewController::class, 'destroy'])
    ->name('admin.reviews.destroy');

Route::post('/reviews/{id}/restore', [ReviewController::class, 'restore'])
    ->name('admin.reviews.restore');

// Restaurants
Route::get('/restaurants', [RestaurantController::class, 'index'])
    ->name('restaurant.index');

Route::get('/restaurants/{id}', [RestaurantController::class, 'show'])
    ->name('restaurant.show');

Route::get('/restaurants/{id}/book', [RestaurantController::class, 'create'])
    ->name('restaurant.book');

Route::post('/restaurants/{id}/book', [RestaurantController::class, 'store'])
    ->name('restaurant.book.store');

// Events
Route::prefix('admin')->group(function () {

    Route::get('/events', [EventController::class, 'index'])
        ->name('admin.events.index');

    Route::get('/events/create', [EventController::class, 'create'])
        ->name('admin.events.create');

    Route::post('/events/store', [EventController::class, 'store'])
        ->name('admin.events.store');

    Route::delete('/events/{id}', [EventController::class, 'destroy'])
        ->name('admin.events.destroy');
});