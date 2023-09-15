<?php

namespace App\Providers;

use App\Models\Content;
use App\Models\Navbar;
use App\Models\Widget;
use App\Models\Widget_navbar;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\URL; // Import URL facade

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
            // $dataNavbar= Navbar::where('slug', '=', $desiredSegment)->first();
            // // dd($dataNavbar);
            // $dataWidget = Widget::where('slug', '=', 'weekly_news')->first();
            // // dd($dataWidget);
            // $dataWidgetNavbar=Widget_navbar::
            // where([
            //     ['navbar_id', '=', $dataNavbar],
            //     ['widget_id', '=', $dataWidget],
            // ])
            // ->first();
            // dd($dataWidgetNavbar);


            
            // dd($desiredSegment);
            // $dataWidget = Widget::with('navbars')->get();
            $dataWidget = Widget::with(['navbars' => function ($query) use ($desiredSegment) {
                $query->where('slug', '=', $desiredSegment);
            }])->where('slug', '=', 'weekly_news')->first();
            // dd($dataWidget->navbars);



            
            // dd($dataWidget[0]->navbars);

            $widget = Widget::get();
            $data = Navbar::orderBy('position', 'asc')->get();
            // $data = "Nama Pengguna"; // Gantilah ini dengan data yang ingin Anda kirim
            // $view->with('data', $data, 'widget', $widget);
            $view->with([
                'data' => $data,
                'dataWidget' => $dataWidget,
                'widget' => $widget
                
            ]);
        });

   
    }
}
