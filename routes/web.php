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
        $categories = \App\Models\Post\PostCategory::withCount('posts')->locale()->paginate();
        return view('dashboard', compact('categories'));
    });

    Route::localeResource('category', \App\Http\Controllers\Post\CategoryController::class)->parents([
        'category.index' => 'dashboard',
        'category.create' => 'category.index',
        'category.show' => 'category.index',
        'category.edit' => 'category.index',
    ]);

    Route::localeResource('post', \App\Http\Controllers\Post\PostController::class)->parents([
        'post.index' => 'dashboard',
        'post.create' => 'post.index',
        'post.show' => 'post.index',
        'post.edit' => 'post.index',
    ]);


});
