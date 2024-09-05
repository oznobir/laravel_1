<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Name;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Gate;

class AdminController extends Controller
{
    /**
     * @param $permission
     * @return Response
     * @throws AuthorizationException
     */
    protected function checkGate($permission): Response
    {
        return Gate::allowIf(fn(Name $user) => $user->hasPermission($permission));
    }
}
