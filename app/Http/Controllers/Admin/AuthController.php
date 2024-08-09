<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ChirpRequest;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
//use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
//use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    /**
     * Display the login view.
     */
    public function index(): Factory|View|Application
    {
        return view('admin.auth.login');
    }

    /**
     * Confirm the user's password.
     */
    public function login(ChirpRequest $request): RedirectResponse
    {
        $data = $request->validated();
        if (! Auth::guard('admin')->attempt($data)) {
            return redirect(route('admin.login'))->withErrors(['password' => __('auth.password')]);
//            throw ValidationException::withMessages([
//                'password' => __('auth.password'),
//            ]);
        }

        $request->session()->put('auth.password_confirmed_at', time());

        return redirect()->intended(route('admin.posts.index', absolute: false));
    }
}
