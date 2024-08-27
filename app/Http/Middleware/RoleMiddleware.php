<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param Closure(Request): (Response) $next
     */
    public function handle(Request $request, Closure $next, $role = null, $permission = null): Response
    {
        if($role !== null && !auth('admin')->user()->hasRole($role)) {
            abort(404);
        }
        if($permission !== null && !auth('admin')->user()->can($permission)) {
            abort(404);
        }
        return $next($request);

    }
}
