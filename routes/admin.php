<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admins;
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
Route::get('/login',[Admins\AuthController::class,'login'])->name('admin.login');
Route::get('/logout',[Admins\AuthController::class,'logout'])->name('admin.logout');
Route::post('/login',[Admins\AuthController::class,'attempt'])->name('admin.login.attempt');

Route::group([
   'middleware' => 'auth:admin',
    'prefix' => '/'
],function(){
    Route::get('/dashboard',[Admins\DashboardController::class,'index'])->name('admin.dashboard');
    Route::post('/attachments',[Admins\AttachmentController::class,'store'])->name('admin.attachment.store');
    Route::name('admin.tools.')->prefix('/tools')->group(function (){
        Route::get('/',[Admins\ToolController::class,'index'])->name('index');
        Route::get('/create',[Admins\ToolController::class,'create'])->name('create');
        Route::post('/store',[Admins\ToolController::class,'store'])->name('store');
    });
});
