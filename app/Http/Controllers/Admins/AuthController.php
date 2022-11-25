<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class AuthController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function login(): View
    {
        Auth::guard('admin')->logout();

        return view('admin.auth.login');
    }

    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function attempt(Request $request): RedirectResponse|View
    {
        $login = Auth::guard('admin')->attempt([
            'password' => $request->get('password'),
            'mobile' => $request->get('mobile')
        ], (bool)$request->get('remember'));
        if ($login) {
            return Redirect::route('admin.dashboard');
        }

        return Redirect::back()->withErrors([
            'account_error' => 'mobile or password not match!'
        ]);
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout(): RedirectResponse
    {
        Auth::guard('admin')->logout();

        return Redirect::route('admin.login');
    }
}
