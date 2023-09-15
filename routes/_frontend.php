<?php
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

Route::get('/', [FeContentCtr::class, 'index']);

Route::get('/test', [FeContentCtr::class, 'test']);

Route::get('/about', [FeContentCtr::class, 'about']);
Route::get('/services', [FeContentCtr::class, 'services']);
Route::get('/clients', [FeContentCtr::class, 'clients']);
Route::get('/portfolio', [FeContentCtr::class, 'portfolio']);
Route::get('/team', [FeContentCtr::class, 'team']);
Route::get('/contact', [FeContentCtr::class, 'contact']);


// Route::get('/clients', function () {
//     return view('frontend/clients');
// });


// Route::get('/services', function () {
//     return view('frontend/services');
// });

// Route::get('/portfolio', function () {
//     return view('frontend/portfolio');
// });


// Route::get('/team', function () {
//     return view('frontend/team');
// });


// Route::get('/contact', function () {
//     return view('frontend/contact');
// });
