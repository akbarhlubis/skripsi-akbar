<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class GreetingServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        // crate a greeting service
        $hour = now()->hour;

        if ($hour >= 5 && $hour < 12) {
            $greeting = 'Selamat Pagi';
        } elseif ($hour >= 12 && $hour < 17) {
            $greeting = 'Selamat Siang';
        } elseif ($hour >= 17 && $hour < 20) {
            $greeting = 'Selamat Sore';
        } else {
            $greeting = 'Selamat Malam';
        }

        $this->app->bind('greeting', function () use ($greeting) {
            return $greeting;
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
