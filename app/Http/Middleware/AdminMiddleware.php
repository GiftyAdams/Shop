<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string $role = 'admin')
    {

        // if (Auth::check()) {

        //     if (Auth::user()->role == $role) {

        //         return $next($request);
        //     }
        //     abort(401);
        // }
        // abort(403);

        if (!Auth::check() || !Auth::user()->isAdmin()) {
            abort(403); // Forbidden
        }

        return $next($request); if (!Auth::check() || !Auth::user()->isAdmin()) {
            abort(403); // Forbidden
        }

        return $next($request);
    }
}
