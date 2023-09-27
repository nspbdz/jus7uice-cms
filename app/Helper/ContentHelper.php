<?php

namespace App\Helper;


use App\Models\Content;
use App\Models\Widget;
use Illuminate\Support\Arr;
use DB;
class ContentHelper
{
    public static function data()
    {
        return "aaaa";
    }

    public static function Availibility($widgetSlug, $path)
    {
        $widgetPages = DB::table('widget_pages')
        ->join('widgets', 'widget_pages.widget_id', '=', 'widgets.id')
        ->join('pages', 'widget_pages.page_id', '=', 'pages.id')
        ->select('widgets.*', 'pages.*')
        ->where('pages.slug', '=', $path)
        ->where('widgets.slug', '=', $widgetSlug)
        ->first();

        return $widgetPages;
    }
}
