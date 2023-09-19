<?php

namespace App\Widgets;

use App\Models\Article;
use Arrilot\Widgets\AbstractWidget;

class BannerNews extends AbstractWidget
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
        //
        $data=Article::find(2);
        return view('widgets.banner_news', [
            'config' => $this->config,
            'data' => $data,
        ]);
    }
}
