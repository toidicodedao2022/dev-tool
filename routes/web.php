<?php

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ToolController;
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
Route::get('/', [ToolController::class,'index'])->name('web.dashboard');
Route::name('tool.')->prefix('tools')->group(function (){
    Route::get('/',[ToolController::class,'index'])->name('index');
    Route::get('/md5',[ToolController::class,'md5'])->name('md5');
    Route::get('/base64',[ToolController::class,'base64'])->name('base64');
    Route::get('/random',[ToolController::class,'random'])->name('random');
    Route::post('/random',[ToolController::class,'random'])->name('random.post');
});
