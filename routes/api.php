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
Route::post('/upload-image', function (Request $request) {
    $upload = $request->file('file')->store('avatars/123','s3');
    dd($upload);
    $upload = \Illuminate\Support\Facades\Storage::disk('s3')->put("dangtinh.png","file content");
    dd($upload);
});
Route::get('/search-ytb',function (){
    $encode = urlencode("đi về nhà");
    $url ="https://suggestqueries.google.com/complete/search?json=suggestCallBack&q={$encode}&hl=en&ds=yt&client=youtube&_=1669363147310&output=toolbar";
    $data = json_decode(utf8_encode(Http::get($url)->body()),true);
    $output = \Illuminate\Support\Arr::get($data,1);
    return response()->json((new \App\Http\Responses\ResponseSuccess([
        'result' => $output
    ]))->toArray());
});