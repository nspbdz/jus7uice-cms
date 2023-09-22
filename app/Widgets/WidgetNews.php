<?php

namespace App\Widgets;

use App\Models\Article;
use App\Models\Page;
use App\Models\Widget;
// use App\Models\WidgetNavbar;
use App\Models\WidgetPage;
use Arrilot\Widgets\AbstractWidget;
use Illuminate\Support\Facades\URL; // Import URL facade

class WidgetNews extends AbstractWidget
{
    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = [];

    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    // public function run()
    // {
    //     $path = basename(URL::current());
    //     // dd($path);

    //     $page = Page::where('slug', '=', $path)->first();
    //     // dd($page);


    //     // $data= WidgetPage::whereIn('navbar_id', $page->id)->get();
    //     $data = WidgetPage::where('navbar_id', $page->id)->get();

    //     // dd($data);


    //     return view('widgets.widget_news', [
    //         'config' => $this->config,
    //         'data' => $data,
    //     ]);
    // }
    public function run()
    {
        $path = basename(URL::current());
        $page = Page::where('slug', '=', $path)->first();
        // $widgetNavbarData = WidgetPage::where('page_id', $page->id)->get();
        // dd($widgetNavbarData);
        // Widget::whereIn('id', $request->deleteItems)->update(['status' => 2]);
        $widgetNavbarData = WidgetPage::where('page_id', $page->id)->pluck('widget_id')->toArray();
        // dd($widgetNavbarData);

        // $widgetData = Widget::whereIn('id', $widgetNavbarData)->pluck('slug')->toArray();
        // dd($widgetData);
        $widgetData = Widget::whereIn('id', $widgetNavbarData)->get();

        $views = [];
        // foreach ($widgetData as $item) {
        //     // Membuat nama tampilan yang unik dengan menggabungkan string
        //     $viewName = 'widgets.' . $item->slug;
        //     // dd($viewName);

        //     $view = view($viewName, [
        //         'config' => $this->config,
        //         'data' => $item,
        //     ]);
        //     $views[] = $view;
        // }

        $numberOfViews = 3; // Ganti dengan jumlah tampilan yang Anda inginkan
        $views = [];
        $data= Article::take(5)->get();
        // ambil dan kirim semua category disini lalu di compact 
        // dd($data);
        for ($i = 1; $i <= $numberOfViews; $i++) {
            $views[] = view("widgets.widget{$i} ")->with('data', $data);;
        }

        return implode('', $views);


        // return view()->multiple($views);
    }
}
