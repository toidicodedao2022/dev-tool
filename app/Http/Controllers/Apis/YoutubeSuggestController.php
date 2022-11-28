<?php

namespace App\Http\Controllers\Apis;

use App\Http\Controllers\Controller;
use App\Http\Responses\ApiResponse;
use App\Http\Responses\ResponseError;
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
        $encode = (string)$request->get('q', '');

        $isEncoded = preg_match('~%[0-9A-F]{2}~i', $encode);
        if (!$isEncoded) {
            $encode = urlencode($encode);
        }
        $time = (string)(time() * 1000);
        $url = "https://suggestqueries.google.com/complete/search?json=suggestCallBack&q={$encode}&hl=en&ds=yt&client=youtube&_={$time}";
        $data = json_decode(utf8_encode(Http::get($url)->body()), true);
        /** @var array $output */
        $output = Arr::get($data, 1, []);

        return response()->json((new ResponseSuccess([
            'result' => (array)$output
        ]))->toArray());
    }

    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function searchListByKeyword(Request $request): JsonResponse
    {
        //https://www.googleapis.com/youtube/v3/search?part=snippet&maxResults=20&q=%C4%91i%20v%E1%BB%81%20nh%C3%A0&type=video&key=AIzaSyBZ-ATWMq2EfmUPnooBX81H8Ya9Tekam1M

        $encode = (string)$request->get('q', '');

        $isEncoded = preg_match('~%[0-9A-F]{2}~i', $encode);
        if (!$isEncoded) {
            $encode = urlencode($encode);
        }
        $url = "https://www.googleapis.com/youtube/v3/search?part=snippet&maxResults=50&q={$encode}&type=video&key="
            .config('google.api_key_youtube');
        $response = Http::get($url)->json();
        if (Arr::exists($response, 'error.code')) {
            $code = (int)Arr::get($response, 'error.code');

            return response()->json((new ResponseError($code, "api error!"))->toArray());
        }
        $region = (string)Arr::get($response, 'regionCode', '');
        $items = (array)Arr::get($response, 'items', []);
        $items = Arr::map($items, function ($item) {
            $imageHigh = (array)Arr::get($item, 'snippet.thumbnails.high', []);

            /** @var array $item */
            return [
                'video_id' => (string)Arr::get($item, 'id.videoId', ''),
                'title' => (string)Arr::get($item, 'snippet.title', ''),
                'image' => $imageHigh,
                'channel_title' => (string)Arr::get($item, 'channelTitle', '')
            ];
        });

        return response()->json((new ResponseSuccess([
            'list' => $items
        ], "country: {$region}", count($items) ? 200 : 204))->toArray());
    }
}
