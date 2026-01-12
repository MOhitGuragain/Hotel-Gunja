<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\GuestBookingController;
use App\Http\Controllers\AdminBookingController;

// Home page → list available rooms
Route::get('/', [RoomController::class, 'index'])
    ->name('rooms.index');

// Show room details
Route::get('/rooms/{id}', [RoomController::class, 'show'])
    ->name('rooms.show');

// Book a room
Route::post('/rooms/{id}/book', [GuestBookingController::class, 'store'])
    ->name('rooms.book');

// Admin: list all bookings
Route::get('/admin/bookings', [AdminBookingController::class, 'index'])
    ->name('admin.bookings.index');

// Admin: approve or reject a booking
Route::post('/admin/bookings/{id}/approve', [AdminBookingController::class, 'approve'])
    ->name('admin.bookings.approve');

Route::post('/admin/bookings/{id}/reject', [AdminBookingController::class, 'reject'])
    ->name('admin.bookings.reject');
