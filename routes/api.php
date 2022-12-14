<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
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

Route::get('/search-ytb',[\App\Http\Controllers\Apis\YoutubeSuggestController::class,'getByKeyWord'])->middleware(['throttle:500,1']);
Route::get('/search-list-video',[\App\Http\Controllers\Apis\YoutubeSuggestController::class,'searchListByKeyword']);