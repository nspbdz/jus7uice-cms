<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Content;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL; // Import URL facade


class FeContentCtr extends Controller
{

   
    public function pages(Request $request)
    {
        $path = basename(URL::current());
        // dd($path);

        // $path = Request::path();
        // dd($path);
        
        $data = Page::where('slug', '=', $path)->first();
        // dd($data);
        return view('frontend.pages', compact('data'));
    }

    
}
