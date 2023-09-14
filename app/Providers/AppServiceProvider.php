<?php

namespace App\Providers;

use App\Models\Content;
use App\Models\Navbar;
use App\Models\Widget;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('layout.frontend', function ($view) {
            $widget = Widget::get();
            $data = Navbar::orderBy('position', 'asc')->get();
            // $data = "Nama Pengguna"; // Gantilah ini dengan data yang ingin Anda kirim
            // $view->with('data', $data, 'widget', $widget);
            $view->with([
                'data' => $data,
                'widget' => $widget
            ]);
        });

        // View::composer('*', function ($view) {
        //     $data = Content::get();

        //     $view->with('globalData', $data);
        // });
    }
}
