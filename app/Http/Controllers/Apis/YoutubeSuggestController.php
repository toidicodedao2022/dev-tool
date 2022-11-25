<?php

namespace App\Http\Controllers\Apis;

use App\Http\Controllers\Controller;
use App\Http\Responses\ApiResponse;
use App\Http\Responses\ResponseSuccess;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Http;

class YoutubeSuggestController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getByKeyWord(Request $request): JsonResponse
    {
        $encode = urlencode((string)$request->get('q', ''));
        $time= (string)(time()*1000);
        $url = "https://suggestqueries.google.com/complete/search?json=suggestCallBack&q={$encode}&hl=en&ds=yt&client=youtube&_={$time}";
        $data = json_decode(utf8_encode(Http::get($url)->body()), true);
        /** @var array $output */
        $output = Arr::get($data, 1,[]);

        return response()->json((new ResponseSuccess([
            'result' => (array)$output
        ]))->toArray());
    }
}
