<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\NameRequest;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;


class AuthController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): Factory|View|Application
    {
        return view('admin.auth.login');
    }

    /**
     * Confirm the user's password.
     * @throws ValidationException
     */
    public function store(NameRequest $request): RedirectResponse
    {

        $data = $request->validated();
        if (! Auth::guard('admin')->attempt($data)) {
//            return redirect(route('admin.login'))->withErrors(['password' => __('auth.password')]);
//            return back()
//                ->withErrors([
//                'password' => __('auth.password'),
//            ]);
            throw ValidationException::withMessages([
                'password' => __('auth.password'),
            ]);
        }
//        $request->session()->regenerate();
//        $request->session()->put('auth.password_confirmed_at', time());

//        return redirect()->intended(route('admin.posts.index', absolute: false));
        return redirect(route('admin.posts.index'));
    }
    /**
     * Destroy an authenticated session.
     */
    public function logout(Request $request): RedirectResponse
    {
        Auth::guard('admin')->logout();
//        $request->session()->invalidate();
//        $request->session()->regenerateToken();
        return redirect(route('dashboard'));
    }
}
