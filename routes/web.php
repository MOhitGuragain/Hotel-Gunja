<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\GuestBookingController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\AdminBookingController;
use App\Http\Controllers\Admin\ReviewController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\EventHallController;

// Home page
Route::get('/', [HomeController::class, 'index'])->name('home');

// Authentication routes
Route::middleware(['auth', 'role:Admin,Receptionist'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::get('/bookings', [AdminBookingController::class, 'index'])
            ->name('bookings.index');

        Route::post('/bookings/{booking}/approve', [AdminBookingController::class, 'approve'])
            ->name('bookings.approve');
});
Route::middleware(['auth', 'role:Admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        /*
        |--------------------------------------------------------------------------
        | Admin Events
        |--------------------------------------------------------------------------
        */
        Route::get('/events', [EventController::class, 'index'])
            ->name('events.index');

        Route::get('/events/create', [EventController::class, 'create'])
            ->name('events.create');

        Route::post('/events/store', [EventController::class, 'store'])
            ->name('events.store');

        Route::delete('/events/{id}', [EventController::class, 'destroy'])
            ->name('events.destroy');

        /*
        |--------------------------------------------------------------------------
        | Admin Reviews
        |--------------------------------------------------------------------------
        */
        Route::get('/reviews', [ReviewController::class, 'index'])
            ->name('reviews.index');

        Route::get('/reviews/create', [ReviewController::class, 'create'])
            ->name('reviews.create');

        Route::post('/reviews', [ReviewController::class, 'store'])
            ->name('reviews.store');

        Route::post('/reviews/{id}/approve', [ReviewController::class, 'approve'])
            ->name('reviews.approve');

        Route::post('/reviews/{id}/reject', [ReviewController::class, 'reject'])
            ->name('reviews.reject');

        Route::delete('/reviews/{review}', [ReviewController::class, 'destroy'])
            ->name('reviews.destroy');

        Route::post('/reviews/{id}/restore', [ReviewController::class, 'restore'])
            ->name('reviews.restore');
    });

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



// Restaurants
Route::get('/restaurants', [RestaurantController::class, 'index'])
    ->name('restaurant.index');

Route::get('/restaurants/{id}', [RestaurantController::class, 'show'])
    ->name('restaurant.show');

Route::get('/restaurants/{id}/book', [RestaurantController::class, 'create'])
    ->name('restaurant.book');

Route::post('/restaurants/{id}/book', [RestaurantController::class, 'store'])
    ->name('restaurant.book.store');

// Event Halls
Route::prefix('event-halls')->group(function () {

    Route::get('/', [EventHallController::class, 'index'])->name('event-halls.index');

    Route::get('/{id}', [EventHallController::class, 'show'])->name('event-halls.show');

    Route::get('/{id}/book', [EventHallController::class, 'create'])->name('event-halls.book');

    Route::post('/{id}/book', [EventHallController::class, 'store'])->name('event-halls.store');
});
use App\Http\Controllers\StaffLoginController;

Route::prefix('staff')->group(function () {
    Route::get('/login', [StaffLoginController::class, 'showLoginForm'])->name('auth.staff-login');
    Route::post('/login', [StaffLoginController::class, 'login'])->name('auth.staff-login.submit');
    Route::post('/logout', [StaffLoginController::class, 'logout'])->name('auth.staff-logout');
});

use App\Http\Controllers\DashboardController;


Route::middleware(['auth'])->get('/dashboard', [DashboardController::class, 'index'])
    ->name('dashboard');


/*
| Admin Dashboard
*/
Route::middleware(['auth', 'role:Admin'])
    ->get('/dashboard/admin', [DashboardController::class, 'admin'])
    ->name('dashboard.admin');


/*
| Receptionist Dashboard
*/
Route::middleware(['auth', 'role:Receptionist'])
    ->get('/dashboard/receptionist', [DashboardController::class, 'receptionist'])
    ->name('dashboard.receptionist');


/*
| Cashier Dashboard
*/
Route::middleware(['auth', 'role:Cashier'])
    ->get('/dashboard/cashier', [DashboardController::class, 'cashier'])
    ->name('dashboard.cashier');