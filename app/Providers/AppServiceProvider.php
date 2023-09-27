<?php

namespace App\Providers;

use App\Models\Content;
use App\Models\Navbar;
use App\Models\Page;
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

            $path = basename(URL::current());

            $canWidgetBanner = ContentHelper::Availibility('banner', $path);
            $canWidgetWeeklyNews = ContentHelper::Availibility('weekly_news', $path);

            $widget = Widget::get();
            $data = Page::orderBy('position', 'asc')->get();
            $view->with([
                'data' => $data,
                'canWidgetWeeklyNews' => $canWidgetWeeklyNews,
                'canWidgetBanner' => $canWidgetBanner,
                'widget' => $widget

            ]);
        });
    }
}
