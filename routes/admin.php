<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['localePrefix' => 'admin.prefix'], function () {

    Route::locale('welcome', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');


    Route::localeResource('post', \App\Http\Controllers\Admin\Post\PostController::class)
    ->names('admin.post')
    ->parents([
        'admin.post.index' => 'admin.dashboard',
        'admin.post.show' => 'admin.post.index',
    ]);

});
