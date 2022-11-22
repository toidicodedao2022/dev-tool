<?php

namespace App\Http\Controllers;

use App\Http\Responses\ResponseSuccess;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ToolController extends Controller
{
    public function __construct()
    {
    }

    /**
     * @return View
     */
    public function index(): View
    {
        return view('tool.index');
    }

    public function md5():JsonResponse|View
    {
        return response()->json((new ResponseSuccess())->response());
    }
}
