<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Room;
use Illuminate\Support\Facades\Schema;

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
    
    // // 0
    // public function boot(): void
    // {
    //     // Get the first available room (or your custom logic)
    //     $featuredRoom = Room::first();

    //     // Make it available in ALL views as $featuredRoom
    //     View::share('featuredRoom', $featuredRoom);
    // }

        public function boot(): void
    {
        if (Schema::hasTable('rooms')) {
            $featuredRoom = \App\Models\Room::first();
            View::share('featuredRoom', $featuredRoom);
        }
    }
}
