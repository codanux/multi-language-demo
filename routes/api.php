<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('auth/login', [\App\Http\Controllers\Api\ApiController::class, 'login']);
Route::post('auth/refresh', [\App\Http\Controllers\Api\ApiController::class, 'refresh']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('auth/logout',  [\App\Http\Controllers\Api\ApiController::class, 'logout']);
    Route::get('auth/user',  [\App\Http\Controllers\Api\ApiController::class, 'user']);

    Route::apiResource('categories', \App\Http\Controllers\Api\Post\PostCategoryController::class);
    Route::apiResource('posts', \App\Http\Controllers\Api\Post\PostController::class);

});
