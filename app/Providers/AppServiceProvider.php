<?php

namespace App\Providers;

use App\Models\Content;
use App\Models\Navbar;
use App\Models\Widget;
use App\Models\WidgetNavbar;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\URL; // Import URL facade
use App\Helper\ContentHelper;

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

            // Mengambil URL saat ini menggunakan URL::current()
            $currentUrl = URL::current();

            // Membagi URL menjadi segmen-segmen
            $segments = explode('/', parse_url($currentUrl, PHP_URL_PATH));

            // Mengambil segmen yang sesuai (misalnya, segmen ke-2)
            $desiredSegment = $segments[1] ?? ''; // Ini akan mengambil segmen ke-2 atau string kosong jika tidak ada

            // Weekly News
            $canWidgetWeeklyNews= ContentHelper::Availibility('weekly_news', $desiredSegment);

            // Banner
            $canWidgetBanner= ContentHelper::Availibility('banner', $desiredSegment);
            // dd($canWidgetBanner);
            // dd(count($canWidgetBanner->navbars));
            // dd(count($canWidgetWeeklyNews->navbars));

            $widget = Widget::get();
            $data = Navbar::orderBy('position', 'asc')->get();
            $view->with([
                'data' => $data,
                'canWidgetWeeklyNews' => count($canWidgetWeeklyNews->navbars),
                'canWidgetBanner' => count($canWidgetBanner->navbars),
                'widget' => $widget

            ]);
        });


    }
}
