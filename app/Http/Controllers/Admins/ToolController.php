<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use App\Services\Admins\ToolService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;
use Illuminate\View\View;

class ToolController extends Controller
{
    public function __construct(protected ToolService $toolService)
    {
    }

    public function index(){

    }

    /**
     * @return \Illuminate\View\View
     */
    public function create(): View
    {
        $routers = Route::getRoutes()->get('GET');
        $routes = array_filter($routers, function ($route) {
            /** @var \Illuminate\Routing\Route $route */

            return str_starts_with($route->getName(), "tool.");
        });
        $names = array_map(function ($route) {
            /** @var \Illuminate\Routing\Route $route */

            return [
                'url' => $route->uri,
                'name' => $route->getName() ?? ''
            ];
        }, $routes);

        return view('admin.tool.create', compact('names'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $data = $request->only([
            'name',
            'router_name',
            'tags',
            'attachment_oid',
            'short_content'
        ]);
        $this->toolService->store($data);

        return Redirect::route('admin.tools.index');
    }
}
