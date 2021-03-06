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

Route::localeResource('newsletter', \App\Http\Controllers\Newsletter\NewsletterController::class)
    ->parents([
        'newsletter.index' => 'dashboard',
        'newsletter.create' => 'newsletter.index',
    ])->only(['index', 'create', 'store']);

Route::middleware(['auth:sanctum', 'verified'])->group(function ()
{
    Route::locale('dashboard', function () {
        $categories = \App\Models\Post\PostCategory::with('translations')->withCount('posts')->locale()->paginate();
        return view('dashboard', compact('categories'));
    });

    Route::localeResource('category', \App\Http\Controllers\Post\CategoryController::class)->parents([
        'category.index' => 'dashboard',
        'category.create' => 'category.index',
        'category.show' => 'category.index',
        'category.edit' => 'category.index',
    ]);

    Route::localeResource('post', \App\Http\Controllers\Post\PostController::class)
        ->localePrefix('category.show')
        ->parents([
            'post.index' => 'category.show',
            'post.create' => 'post.index',
            'post.show' => 'post.index',
            'post.edit' => 'post.index',
        ]);

});
