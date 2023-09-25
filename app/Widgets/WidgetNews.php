<?php

namespace App\Widgets;

use App\Models\Article;
use App\Models\ArticleCategory;
use App\Models\Category;
use App\Models\Page;
use App\Models\Widget;
// use App\Models\WidgetNavbar;
use App\Models\WidgetPage;
use Arrilot\Widgets\AbstractWidget;
use Illuminate\Support\Facades\URL; // Import URL facade
use Illuminate\Support\Facades\DB;

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
    
    public function run()
    {



        $path = basename(URL::current());
        $page = Page::where('slug', '=', $path)->first();

        if($page !== null)
        {
            $widgetNavbarData = WidgetPage::where('page_id', $page->id)->pluck('widget_id')->toArray();
            $widgetData = Widget::whereIn('id', $widgetNavbarData)->get();
        }   

        $views = [];
        $numberOfViews = 3; // Ganti dengan jumlah tampilan yang Anda inginkan
        $views = [];
        $data= Article::take(4)->get();
        // $specialData= Article::get();
        $specialData= DB::table('articles')
        ->join('article_categories', 'articles.id', '=', 'article_categories.article_id')
        ->select('articles.*', 'article_categories.category_id')
        ->get();
    
        $categories = Category::take(4)->get();
        // ambil dan kirim semua category disini lalu di compact 
        // dd($data);
        for ($i = 1; $i <= $numberOfViews; $i++) {
            $views[] = view("widgets.widget{$i} ")
            ->with('data', $data )
            ->with('specialData', $specialData )
            ->with('categories', $categories);
        }

        return implode('', $views);

    }
}
