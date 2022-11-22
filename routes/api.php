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
Route::get('/', function () {
    $get = \Illuminate\Support\Facades\Http::get("http://dym-job-dev.ap-southeast-1.elasticbeanstalk.com/search/129");
    dd($get);
    return view('welcome2');
});