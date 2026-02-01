<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\GuestBookingController;
use App\Http\Controllers\AdminBookingController;

// Home page → hero section
Route::get('/', function () {
    return view('home');
})->name('home');

// Rooms listing
Route::get('/rooms', [RoomController::class, 'index'])
    ->name('rooms.index');

// Show room details
Route::get('/rooms/{id}', [RoomController::class, 'show'])
    ->name('rooms.show');

//360 image tour
Route::get('/360-tour', function () {
    return view('pages.360tour');
});


// Book a room
// Show booking page
Route::get('/rooms/{category}/book', [GuestBookingController::class, 'create'])
    ->name('rooms.book');

// Store booking
Route::post('/rooms/{category}/book', [GuestBookingController::class, 'store'])
    ->name('rooms.book.store');

// Admin: list all bookings
Route::get('/admin/bookings', [AdminBookingController::class, 'index'])
    ->name('admin.bookings.index');

// Admin: approve or reject a booking
Route::post('/admin/bookings/{id}/approve', [AdminBookingController::class, 'approve'])
    ->name('admin.bookings.approve');

Route::post('/admin/bookings/{id}/reject', [AdminBookingController::class, 'reject'])
    ->name('admin.bookings.reject');
