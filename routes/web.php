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
use App\Http\Controllers\AdminGalleryController;
use App\Http\Controllers\Admin\BillingController;
use App\Http\Controllers\Admin\RestaurantOrderController;

// Home page
Route::get('/', [HomeController::class, 'index'])->name('home');

//developer page
Route::view('/developers', 'developers');

// Authentication routes
Route::middleware(['auth', 'role:Admin,Receptionist'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::get('/bookings', [AdminBookingController::class, 'index'])
            ->name('bookings.index');

        Route::post('/bookings/{booking}/approve', [AdminBookingController::class, 'approve'])
            ->name('bookings.approve');
        Route::post('/bookings/{booking}/reject', [AdminBookingController::class, 'reject'])
            ->name('bookings.reject');

            Route::get('/bookings/{booking}/order-food',
    [RestaurantOrderController::class,'create'])
    ->name('orders.create');

Route::post('/bookings/{booking}/order-food',
    [RestaurantOrderController::class,'store'])
    ->name('orders.store');
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

// Admin: list all bookings
Route::get('/admin/bookings', [AdminBookingController::class, 'index'])
    ->name('admin.bookings.index');

// Reviews
Route::get('/reviews', [ReviewController::class, 'index'])
    ->name('admin.reviews.index');


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



//Gallery Routes


// Public Gallery Page (Navbar Gallery)
Route::get('/gallery', [AdminGalleryController::class, 'galleryPage'])
    ->name('gallery.page');

// Admin Gallery Panel
Route::prefix('admin')->group(function () {

    // View all images Gallery list
    Route::get('/gallery', [AdminGalleryController::class, 'index'])
        ->name('admin.gallery.index');

    // Create page (UPLOAD FORM)
    Route::get('/gallery/create', [AdminGalleryController::class, 'create'])
        ->name('admin.gallery.create');

    // Upload image
    //Store Image
    Route::post('/gallery/store', [AdminGalleryController::class, 'store'])
        ->name('admin.gallery.store');


    // Approve image
    Route::post('/gallery/approve/{id}', [AdminGalleryController::class, 'approve'])
        ->name('admin.gallery.approve');

    // Show on homepage toggle
    Route::post('/gallery/homepage/{id}', [AdminGalleryController::class, 'Homepage'])
        ->name('admin.gallery.homepage');

    // Hide from homepage
    Route::post('/admin/gallery/hide-homepage/{id}', [AdminGalleryController::class, 'hideHomepage'])
        ->name('admin.gallery.hideHomepage');

    // Delete image
    Route::delete('/gallery/{id}', [AdminGalleryController::class, 'destroy'])
        ->name('admin.gallery.destroy');
});
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

    /*
| Billing Routes
*/
Route::middleware(['auth', 'role:Cashier'])
    ->prefix('billing')
    ->name('billing.')
    ->group(function () {
        Route::post('/generate/{bookingId}', [BillingController::class, 'generateBill'])
            ->name('generate');
            Route::post('/pay/{billId}', [BillingController::class, 'payBill'])
            ->name('pay');
            Route::post('/refund/{billId}', [BillingController::class, 'refundBill'])
            ->name('refund');
            Route::post('/cancel/{billId}', [BillingController::class, 'cancelBill'])
            ->name('cancel');
            Route::post('/mark-paid/{billId}', [BillingController::class, 'markAsPaid'])
            ->name('mark-paid');
            Route::post('/mark-unpaid/{billId}', [BillingController::class, 'markAsUnpaid'])
            ->name('mark-unpaid');
            
    });
    Route::get('/admin/invoice/{bookingId}', 
    [App\Http\Controllers\Admin\BillingController::class, 'downloadInvoice']
)->name('invoice.download');

Route::get('/admin/invoice/{bookingId}/view', 
    [App\Http\Controllers\Admin\BillingController::class, 'viewInvoice']
)->name('invoice.view');

Route::get('/reviews/create', [ReviewController::class, 'create'])
            ->name('reviews.create');

use App\Http\Controllers\Admin\AdminRoomController;

Route::prefix('admin')
    ->middleware(['auth', 'role:Admin'])
    ->name('admin.')
    ->group(function () {

        Route::resource('rooms', AdminRoomController::class);
});

use App\Http\Controllers\Admin\MenuItemController;

Route::prefix('admin')->name('admin.')->group(function(){

    Route::resource('menu-items', MenuItemController::class)
        ->except(['show','destroy']);

});

use App\Http\Controllers\Admin\RestaurantTableController;

Route::prefix('admin')->name('admin.')->group(function(){

    Route::resource('restaurant-tables', RestaurantTableController::class)
        ->except(['show','destroy']);

});