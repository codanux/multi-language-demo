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

    Route::locale('admin.dashboard', function () {
        return view('admin.dashboard');
    });


    Route::localeResource('category', \App\Http\Controllers\Admin\Post\CategoryController::class)
        ->names('admin.category')
        ->parents([
            'admin.category.index' => 'admin.dashboard',
            'admin.category.create' => 'admin.category.index',
            'admin.category.show' => 'admin.category.index',
            'admin.category.edit' => 'admin.category.index',
        ]);

    Route::localeResource('post', \App\Http\Controllers\Admin\Post\PostController::class)
        ->names('admin.post')
        ->localePrefix('category.show')
        ->parents([
            'admin.post.index' => 'admin.category.show',
            'admin.post.create' => 'admin.post.index',
            'admin.post.show' => 'admin.post.index',
            'admin.post.edit' => 'admin.post.index',
        ]);

});
