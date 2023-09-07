<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
    // return view('welcome');
// });


require_once('_frontend.php');
require_once('_backend.php');

// Route::get('/', [App\Http\Controllers\AppCtr::class, 'index']);
Route::get('/migrate', [App\Http\Controllers\MigrationCtr::class, 'index']);