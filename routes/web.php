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
Route::get('/', function () {

})->name('web.dashboard');
Route::group(['prefix'=>'tools'],function (){
    Route::get('/',[\App\Http\Controllers\ToolController::class,'index']);
    Route::get('/md5',[\App\Http\Controllers\ToolController::class,'md5'])->name('md5');
    Route::get('/base64',[\App\Http\Controllers\ToolController::class,'base64'])->name('base64');
})->name('tool.');
