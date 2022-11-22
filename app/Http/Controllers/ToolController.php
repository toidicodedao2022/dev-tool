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
        return view('tool.index');
    }

    public function md5(Request $request): JsonResponse|View
    {
        if ($request->expectsJson()) {
            $output = $this->toolService->md5($request->get("key"));

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
}
