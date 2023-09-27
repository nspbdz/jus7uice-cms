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
        $widgetData = '';
        if ($page !== null) {
            // mengambil semua data widget yang dimiliki oleh url ini 
            $widgetNavbarData = WidgetPage::where('page_id', $page->id)->pluck('widget_id')->toArray();
            // mengambil data yang memiliki nama awal widget saja 
            $widgetData = Widget::whereIn('id', $widgetNavbarData)
                ->where(DB::raw('widgets.slug'), 'LIKE', '%' . 'widget' . '%')
                ->get();
        }

        $views = [];
        $data = Article::take(4)->get();
        $specialData = DB::table('articles')
            ->join('article_categories', 'articles.id', '=', 'article_categories.article_id')
            ->select('articles.*', 'article_categories.category_id')
            ->distinct('article_categories.article_id') // Menambahkan distinct untuk memastikan data yang unik berdasarkan articles.id
            ->orderBy('articles.id', 'desc')
            ->get();

        $categories = Category::take(4)->get();
        for ($i = 1; $i <= count($widgetData); $i++) {
            $views[] = view("widgets.widget{$i} ")
                ->with('data', $data)
                ->with('specialData', $specialData)
                ->with('categories', $categories);
        }

        return implode('', $views);
    }
}
