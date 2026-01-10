<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\GuestBookingController;
use App\Http\Controllers\AdminBookingController;

// Home page → list available rooms
Route::get('/', [RoomController::class, 'index']);

// Show room details
Route::get('/rooms/{id}', [RoomController::class, 'show']);

// Book a room (NEW)
Route::post('/rooms/{id}/book', [GuestBookingController::class, 'store']);


// Admin: list all bookings
Route::get('/admin/bookings', [AdminBookingController::class, 'index']);

// Admin: approve or reject a booking
Route::post('/admin/bookings/{id}/approve', [AdminBookingController::class, 'approve']);
Route::post('/admin/bookings/{id}/reject', [AdminBookingController::class, 'reject']);

