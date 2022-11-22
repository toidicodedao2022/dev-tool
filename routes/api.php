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
Route::post('/upload-image', function (Request $request) {
    $upload = $request->file('file')->store('avatars/123','s3');
    dd($upload);
    $upload = \Illuminate\Support\Facades\Storage::disk('s3')->put("dangtinh.png","file content");
    dd($upload);
});
