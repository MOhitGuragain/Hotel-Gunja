<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\GuestBookingController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\AdminBookingController;
use App\Http\Controllers\Admin\ReviewController;

// Home page → hero section
// Route::get('/', function () {
//     return view('home');
// })->name('home');

// Home page → dynamic (reviews, hero, etc.)
Route::get('/', [HomeController::class, 'index'])->name('home');

// Rooms listing
Route::get('/rooms', [RoomController::class, 'index'])
    ->name('rooms.index');

// Book a room
// Show booking page
Route::get('/rooms/{id}/book', [GuestBookingController::class, 'create'])
    ->name('rooms.book');

// Store booking
Route::post('/rooms/{id}/book', [GuestBookingController::class, 'store'])
    ->name('rooms.book.store');

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

    // Reviews list
    Route::get('/reviews', [ReviewController::class, 'index'])
        ->name('admin.reviews.index');

    // Add review (manual / future API use)
    Route::get('/reviews/create', [ReviewController::class, 'create'])
        ->name('admin.reviews.create');

    // Store review
    Route::post('/reviews', [ReviewController::class, 'store'])
        ->name('admin.reviews.store');

    // Approve / Reject
    Route::post('/reviews/{id}/approve', [ReviewController::class, 'approve'])
        ->name('admin.reviews.approve');

    Route::post('/reviews/{id}/reject', [ReviewController::class, 'reject'])
        ->name('admin.reviews.reject');

    // Soft Delete review
    Route::delete('/reviews/{review}', [ReviewController::class, 'destroy'])
        ->name('admin.reviews.destroy');

    // add restore route 
    Route::post('/reviews/{id}/restore', [ReviewController::class, 'restore'])
    ->name('admin.reviews.restore');

});

