<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Room;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Get the first available room (or your custom logic)
        $featuredRoom = Room::first();

        // Make it available in ALL views as $featuredRoom
        View::share('featuredRoom', $featuredRoom);
    }
}
