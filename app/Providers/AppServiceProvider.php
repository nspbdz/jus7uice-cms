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
            $canWidgetWeeklyNews = ContentHelper::Availibility('weekly_news', $desiredSegment);
            // Memeriksa apakah 'navbars' ada dan memiliki data
            $canWidgetWeeklyNews = ($canWidgetWeeklyNews && $canWidgetWeeklyNews->navbars) ? $canWidgetWeeklyNews->navbars : null;
            // dd($canWidgetWeeklyNews);
            // Banner
            $canWidgetBanner = ContentHelper::Availibility('banner', $desiredSegment);
            $canWidgetBanner = ($canWidgetBanner && $canWidgetBanner->navbars) ? $canWidgetBanner->navbars : null;
            
            // dd($canWidgetBanner);
            // dd(count($canWidgetBanner->navbars));
            // dd(count($canWidgetWeeklyNews->navbars));

            $widget = Widget::get();
            $data = Navbar::orderBy('position', 'asc')->get();
            $view->with([
                'data' => $data,
                'canWidgetWeeklyNews' => $canWidgetWeeklyNews,
                'canWidgetBanner' => $canWidgetBanner,
                // 'canWidgetBanner' => count($canWidgetBanner->navbars),
                'widget' => $widget

            ]);
        });
    }
}
