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

Route::locale('welcome', function () {
    return view('welcome');
});


Route::middleware(['auth:sanctum', 'verified'])->group(function ()
{
    Route::locale('dashboard', function () {
        return view('dashboard');
    });


    Route::locale('post.index', '\App\Http\Controllers\Post\PostController@index');
    Route::locale('post.show', '\App\Http\Controllers\Post\PostController@show');
    Route::locale('post.create', '\App\Http\Controllers\Post\PostController@create');
    Route::locale('post.create', '\App\Http\Controllers\Post\PostController@store')->method('POST');
    Route::locale('post.edit', '\App\Http\Controllers\Post\PostController@edit');
    Route::locale('post.edit', '\App\Http\Controllers\Post\PostController@update')->method('PUT');
    Route::locale('post.destroy', '\App\Http\Controllers\Post\PostController@destroy')->method('DELETE');


    //Route::localeResource('post', \App\Http\Controllers\Post\PostController::class);
});
