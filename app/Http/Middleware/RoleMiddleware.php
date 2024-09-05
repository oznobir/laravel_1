<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     *
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure(Request): (Response) $next
     * @param string $role
     * @param string|null $permission
     * @return Response
     */
    public function handle(Request $request, Closure $next, string $role, ?string $permission = null): Response
    {
//        $name = Auth::guard('admin')->user();
        $name = $request->user();
        if( !$name->hasRole($role))
            abort(404);

        if($permission !== null && !$name->can($permission))
            abort(404);

        return $next($request);

    }
}
