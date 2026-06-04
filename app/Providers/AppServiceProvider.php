<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Schema; // <-- 1. IMPORT THIS FACADE

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
        // Force HTTPS links on Render production
        if (config('app.env') === 'production' || env('APP_URL') !== 'http://localhost') {
            URL::forceScheme('https');
        }

        // 2. ADD THIS LINE: Prevents string length errors when creating the sessions table
        Schema::defaultStringLength(191);
    }
}