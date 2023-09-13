<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ContentServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        require_once app_path() . '/Helper/ContentHelper.php';
        
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
