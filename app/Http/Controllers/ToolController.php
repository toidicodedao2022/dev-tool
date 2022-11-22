<?php

namespace App\Http\Controllers;

use App\Http\Responses\ResponseSuccess;
use App\Services\ToolService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ToolController extends Controller
{
    public function __construct(protected ToolService $toolService)
    {
    }

    /**
     * @return View
     */
    public function index(): View
    {
        $tools = [
            [
                'name' => 'MD5',
                'image' => 'https://4.imimg.com/data4/XH/FE/MY-310713/nr_0032_62x49-1000x1000.jpg',
                'short_content'=>'text ngan',
                'tag' => [
                    '1233','234'
                ],
                'count_like' => 10,
                'route_name' => 'tool.md5',
                'count_share' => 20
            ],
            [
                'name' => 'MD5',
                'image' => 'https://cdn-icons-png.flaticon.com/512/2720/2720641.png',
                'short_content'=>'text ngan',
                'tag' => [
                    '1233','234'
                ],
                'count_like' => 10,
                'route_name' => 'tool.md5',
                'count_share' => 20
            ],
            [
                'name' => 'MD5',
                'image' => 'https://cdn-icons-png.flaticon.com/512/2720/2720641.png',
                'short_content'=>'text ngan',
                'tag' => [
                    '1233','234'
                ],
                'count_like' => 10,
                'route_name' => 'tool.md5',
                'count_share' => 20
            ],
            [
                'name' => 'MD5',
                'image' => 'https://cdn-icons-png.flaticon.com/512/2720/2720641.png',
                'short_content'=>'text ngan',
                'tag' => [
                    '1233','234'
                ],
                'count_like' => 10,
                'route_name' => 'tool.md5',
                'count_share' => 20
            ],
            [
                'name' => 'MD5',
                'image' => 'https://cdn-icons-png.flaticon.com/512/2720/2720641.png',
                'short_content'=>'text ngan',
                'tag' => [
                    '1233','234'
                ],
                'count_like' => 10,
                'route_name' => 'tool.md5',
                'count_share' => 20
            ],
            [
                'name' => 'MD5',
                'image' => 'https://cdn-icons-png.flaticon.com/512/2720/2720641.png',
                'short_content'=>'text ngan',
                'tag' => [
                    '1233','234'
                ],
                'count_like' => 10,
                'route_name' => 'tool.md5',
                'count_share' => 20
            ],
            [
                'name' => 'MD5',
                'image' => 'https://cdn-icons-png.flaticon.com/512/2720/2720641.png',
                'short_content'=>'text ngan',
                'tag' => [
                    '1233','234'
                ],
                'count_like' => 10,
                'route_name' => 'tool.md5',
                'count_share' => 20
            ]
        ];
        return view('tool.index',compact('tools'));
    }

    public function md5(Request $request): JsonResponse|View
    {
        if ($request->expectsJson()) {
            $output = $this->toolService->md5((string)$request->get("input"));
            return response()->json((new ResponseSuccess([
                'result' => $output
            ]))->toArray());
        }

        return view('tool.md5');
    }

    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\JsonResponse|\Illuminate\View\View
     */
    public function base64(Request $request): JsonResponse|View
    {
        if ($request->expectsJson()) {
            $output = $this->toolService->base64((string)$request->get("input"), (string)$request->get('type'));

            return response()->json((new ResponseSuccess([
                'result' => $output
            ]))->toArray());
        }

        return view('tool.base64');
    }

    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\JsonResponse|\Illuminate\View\View
     */
    public function random(Request $request): JsonResponse|View
    {
        if ($request->getMethod() === "POST") {
            $output = $this->toolService->random($request->all(['chars', 'length']));

            return response()->json((new ResponseSuccess([
                'result' => $output
            ]))->toArray());
        }
        return view('tool.random');
    }
}
