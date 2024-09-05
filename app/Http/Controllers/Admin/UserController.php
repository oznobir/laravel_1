<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\Name;
use App\Models\User;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Gate;

class UserController extends AdminController
{
    /**
     * Display a listing of the resource.
     * @throws AuthorizationException
     */
    public function index(): Factory|View|Application
    {
        $this->checkGate('show-users');

        $users = User::query()
            ->paginate(10);
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     * @throws AuthorizationException
     */
    public function create(): Factory|View|Application
    {
        $this->checkGate('create-users');

        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     * @throws AuthorizationException
     */
    public function store(UserRequest $request): Application|Redirector|RedirectResponse
    {
        $this->checkGate('create-users');

        User::create($request->validated());
        return redirect(route('admin.users.index'));
    }

    /**
     * Display the specified resource.
     * @throws AuthorizationException
     */
    public function show(User $user): Factory|View|Application
    {
        $this->checkGate('show-users');

        return view('admin.users.show', compact('user'));
    }


    /**
     * Remove the specified resource from storage.
     * @throws AuthorizationException
     */
    public function destroy(User $user): Application|Redirector|RedirectResponse
    {
        $this->checkGate('delete-users');

        $user->delete();
        return redirect(route('admin.users.index'));
    }
}
