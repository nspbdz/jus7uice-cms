<?php

namespace App\Helper;


use App\Models\Content;
use App\Models\Widget;
use Illuminate\Support\Arr;

class ContentHelper
{
    public static function data()
    {
        return "aaaa";
    }

    public static function Availibility($widgetSlug, $desiredSegment)
    {
        // dd($desiredSegment);
        // dd($widgetSlug);
        $dataWidget = Widget::with(['page' => function ($query) use ($desiredSegment) {
            $query->where('slug', '=', $desiredSegment);
        }])->where('slug', '=', $widgetSlug)->where('status', '=', 1)->first();

        return $dataWidget;
    }
}
