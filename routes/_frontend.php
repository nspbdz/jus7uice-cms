<?php

use App\Http\Controllers\Backend\ArticleCtr;
use App\Http\Controllers\Backend\LoginCtr;
use App\Http\Controllers\frontend\FeContentCtr;
// Route::get('/test', function () {
//     return view('frontend/index');
// });
// Route::get('/', function () {
//     return view('frontend/index');
// });

Route::get('/helpertest', function () {
    return ContentHelp::data();
});


Route::get('{url}', [FeContentCtr::class, 'pages']);


Route::get('article/{url}', [ArticleCtr::class, 'article']);

