<?php

namespace App\Widgets;

use App\Models\Article;
use App\Models\Widget;
use Arrilot\Widgets\AbstractWidget;
use Illuminate\Http\Request;


class WeeklyNews extends AbstractWidget
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
    public function run(Request $request)   
    {
        $dataWidget=Widget::with('articles')->where('slug', '=', 'weekly_news')->first();
        // dd($dataWidget->articles);
        $data=$dataWidget->articles ?? null;

        // dd(json_decode($dataWidget->url));
        // $page='';
        // foreach(json_decode($dataWidget->url) as $items){
        //     // dd($items);
        //     $page=$request->is($items);
        // }
        // dd($page);
        // if ($request->is('about')) {
        //     // Your code here
        //     dd('masuk');
        // }
        
        return view('widgets.weekly_news', [

            'data' => $data,
            'config' => $this->config,
        ]);
    }
}
