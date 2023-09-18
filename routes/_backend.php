<?php

use App\Http\Controllers\Backend\LoginCtr;
use App\Http\Controllers\Backend\MainCtr;
use App\Http\Controllers\Backend\TesterCtr;
use App\Http\Controllers\Backend\BackendLogsCtr;
use App\Http\Controllers\Backend\UserCtr;
use App\Http\Controllers\Backend\AdministratorGroupCtr;
use App\Http\Controllers\Backend\AdministratorCtr;
use App\Http\Controllers\Backend\MediaAlbumCtr;
use App\Http\Controllers\Backend\MediaCtr;
use App\Http\Controllers\Backend\ArticleCtr;
use App\Http\Controllers\backend\ContentCtr;
use App\Http\Controllers\Backend\NavbarCtr;
use App\Http\Controllers\WidgetController;

Route::prefix(BACKEND_PATH)->middleware(['backend.check.auth.exists'])->controller(LoginCtr::class)->group(function () {
    Route::get('login', 'getLogin')->name('login');
    Route::post('login', 'postLogin')->name('login');
});
Route::get(BACKEND_PATH . 'logout', [App\Http\Controllers\Backend\LoginCtr::class, 'getLogout']);

Route::group(['prefix' => BACKEND_PATH, 'namespace' => 'Backend\\', 'middleware' => ['backend']], function () {


	

    Route::get('/', [MainCtr::class, 'index']);
    Route::get('tester', [TesterCtr::class, 'getTester']);

    Route::get('widget', [WidgetController::class, 'index']);
    Route::get('widget.data', [WidgetController::class, 'getData']);
    Route::get('widget.create', [WidgetController::class, 'getCreate']);
    Route::post('widget.create', [WidgetController::class, 'store']);
    Route::get('widget.edit', [WidgetController::class, 'getEdit']);
    Route::post('widget.update', [WidgetController::class, 'update']);
    Route::get('widget.delete', [WidgetController::class, 'getDelete']);
    Route::post('widget.delete', [WidgetController::class, 'postDelete']);


    Route::get('content', [ContentCtr::class, 'index']);
    Route::get('content.data', [ContentCtr::class, 'getData']);
    Route::get('content.create', [ContentCtr::class, 'getCreate']);
    Route::post('content.create', [ContentCtr::class, 'store']);
    Route::get('content.edit/{id?}', [ContentCtr::class, 'getEdit']);
    Route::put('content.update/{id?}', [ContentCtr::class, 'update']);
    Route::post('content.delete', [ContentCtr::class, 'postDelete']);
    Route::get('content.delete', [ContentCtr::class, 'getDelete']);

    Route::get('article', [ArticleCtr::class, 'index']);
    Route::get('article.data', [ArticleCtr::class, 'getData']);
    Route::get('article.create', [ArticleCtr::class, 'getCreate']);
    Route::post('article.create', [ArticleCtr::class, 'store']);
    Route::get('article.edit/{id?}', [ArticleCtr::class, 'getEdit']);
    Route::put('article.update/{id?}', [ArticleCtr::class, 'update']);
    Route::post('article.delete', [ArticleCtr::class, 'postDelete']);
    Route::get('article.delete', [ArticleCtr::class, 'getDelete']);

    Route::get('navbar', [NavbarCtr::class, 'index']);
    Route::get('navbar.data', [NavbarCtr::class, 'getData']);
    Route::get('navbar.create', [NavbarCtr::class, 'getCreate']);
    Route::post('navbar.create', [NavbarCtr::class, 'store']);
    Route::get('navbar.edit', [NavbarCtr::class, 'getEdit']);
    Route::post('navbar.update', [NavbarCtr::class, 'update']);
    Route::get('navbar.delete', [NavbarCtr::class, 'getDelete']);
    Route::post('navbar.delete', [NavbarCtr::class, 'postDelete']);
    Route::post('navbar.post-sortable', [NavbarCtr::class, 'position']);


    // Route::get('post', [NavbarCtr::class, 'indexTest']);

    Route::get('backend.log', [BackendLogsCtr::class, 'index']);
    Route::get('backend.log.data', [BackendLogsCtr::class, 'getData']);
    Route::get('backend.log.report.export', [BackendLogsCtr::class, 'getExport']);

    Route::get('users', [UserCtr::class, 'index']);
    Route::get('user.data', [UserCtr::class, 'getData']);
    Route::get('user.create', [UserCtr::class, 'getCreate']);
    Route::post('user.create', [UserCtr::class, 'postCreate']);
    Route::get('user.edit', [UserCtr::class, 'getEdit']);
    Route::post('user.edit', [UserCtr::class, 'postEdit']);
    Route::get('user.delete', [UserCtr::class, 'getDelete']);
    Route::post('user.delete', [UserCtr::class, 'postDelete']);


    Route::get('administrator.group', [AdministratorGroupCtr::class, 'index']);
    Route::get('administrator.group.data', [AdministratorGroupCtr::class, 'getData']);
    Route::get('administrator.group.create', [AdministratorGroupCtr::class, 'getCreate']);
    Route::post('administrator.group.create', [AdministratorGroupCtr::class, 'postCreate']);
    Route::get('administrator.group.edit', [AdministratorGroupCtr::class, 'getEdit']);
    Route::post('administrator.group.edit', [AdministratorGroupCtr::class, 'postEdit']);
    Route::get('administrator.group.delete', [AdministratorGroupCtr::class, 'getDelete']);
    Route::post('administrator.group.delete', [AdministratorGroupCtr::class, 'postDelete']);

    Route::get('administrator.account', [AdministratorCtr::class, 'index']);
    Route::get('administrator.account.data', [AdministratorCtr::class, 'getData']);
    Route::get('administrator.account.create', [AdministratorCtr::class, 'getCreate']);
    Route::post('administrator.account.create', [AdministratorCtr::class, 'postCreate']);
    Route::get('administrator.account.edit', [AdministratorCtr::class, 'getEdit']);
    Route::post('administrator.account.edit', [AdministratorCtr::class, 'postEdit']);
    Route::get('administrator.account.view', [AdministratorCtr::class, 'getView']);
    Route::get('administrator.account.delete', [AdministratorCtr::class, 'getDelete']);
    Route::post('administrator.account.delete', [AdministratorCtr::class, 'postDelete']);

    Route::get('media.album', [MediaAlbumCtr::class, 'index']);
    Route::get('media.album.data', [MediaAlbumCtr::class, 'getData']);
    Route::get('media.album.create', [MediaAlbumCtr::class, 'getCreate']);
    Route::post('media.album.create', [MediaAlbumCtr::class, 'postCreate']);
    Route::get('media.album.edit', [MediaAlbumCtr::class, 'getEdit']);
    Route::post('media.album.edit', [MediaAlbumCtr::class, 'postEdit']);
    Route::get('media.album.delete', [MediaAlbumCtr::class, 'getDelete']);
    Route::post('media.album.delete', [MediaAlbumCtr::class, 'postDelete']);

    Route::get('media', [MediaCtr::class, 'index']);
    Route::get('media.data', [MediaCtr::class, 'getData']);
    Route::get('media.create', [MediaCtr::class, 'getCreate']);
    Route::post('media.create', [MediaCtr::class, 'postCreate']);
    Route::get('media.edit', [MediaCtr::class, 'getEdit']);
    Route::post('media.edit', [MediaCtr::class, 'postEdit']);
    Route::get('media.delete', [MediaCtr::class, 'getDelete']);
    Route::post('media.delete', [MediaCtr::class, 'postDelete']);
});
