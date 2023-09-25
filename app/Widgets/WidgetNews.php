<?php

namespace App\Widgets;

use App\Models\Article;
use App\Models\Category;
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
        // dd($path);
        $page = Page::where('slug', '=', $path)->first();
        // dd($page);
        // $widgetNavbarData = WidgetPage::where('page_id', $page->id)->get();
        // dd($widgetNavbarData);
        // Widget::whereIn('id', $request->deleteItems)->update(['status' => 2]);
        if($page !== null)
        {
            $widgetNavbarData = WidgetPage::where('page_id', $page->id)->pluck('widget_id')->toArray();
            $widgetData = Widget::whereIn('id', $widgetNavbarData)->get();
        }   
        // dd($widgetNavbarData);

        // $widgetData = Widget::whereIn('id', $widgetNavbarData)->pluck('slug')->toArray();
        // dd($widgetData);

        $views = [];
        $numberOfViews = 3; // Ganti dengan jumlah tampilan yang Anda inginkan
        $views = [];
        $data= Article::take(4)->get();
        $categories = Category::take(4)->get();
        // ambil dan kirim semua category disini lalu di compact 
        // dd($data);
        for ($i = 1; $i <= $numberOfViews; $i++) {
            $views[] = view("widgets.widget{$i} ")
            ->with('data', $data )
            ->with('categories', $categories);
        }

        return implode('', $views);


        // return view()->multiple($views);
    }
}
