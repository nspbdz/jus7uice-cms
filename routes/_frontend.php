<?php
use App\Http\Controllers\Backend\LoginCtr;


// Route::get('/test', function () {
//     return view('frontend/index');
// });
Route::get('/', function () {
    return view('frontend/index');
});

Route::get('/clients', function () {
    return view('frontend/clients');
});

Route::get('/about', function () {
    return view('frontend/about');
});

Route::get('/services', function () {
    return view('frontend/services');
});

Route::get('/portfolio', function () {
    return view('frontend/portfolio');
});


Route::get('/team', function () {
    return view('frontend/team');
});


Route::get('/contact', function () {
    return view('frontend/contact');
});