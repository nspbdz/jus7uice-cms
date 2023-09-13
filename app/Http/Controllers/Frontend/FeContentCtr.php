<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Content;
use Illuminate\Http\Request;

class FeContentCtr extends Controller
{
    public function index()
    {
        $data = Content::where('slug', '=', '')->first();

        return view('frontend.index', compact('data'));
    }

    public function about()
    {
        $data = Content::where('slug', '=', 'about')->first();
        return view('frontend.about', compact('data'));
    }

    public function services()
    {
        $data = Content::where('slug', '=', 'services')->first();
        return view('frontend.services', compact('data'));
    }
    public function portfolio()
    {
        $data = Content::where('slug', '=', 'portfolio')->first();
        return view('frontend.portfolio', compact('data'));
    }

    public function team()
    {
        $data = Content::where('slug', '=', 'team')->first();
        return view('frontend.team', compact('data'));
    }

    public function contact()
    {
        $data = Content::where('slug', '=', 'contact')->first();
        return view('frontend.contact', compact('data'));
    }
}
