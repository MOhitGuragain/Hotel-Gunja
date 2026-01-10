<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoomController;

// Home page → list available rooms
Route::get('/', [RoomController::class, 'index']);

// Show room details
Route::get('/rooms/{id}', [RoomController::class, 'show']);
