<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {

        // غير مسجل دخول
        if (!Auth::check()) {
            return redirect()->route('index');
        }

        // Role غير مسموح
        if (!in_array(Auth::user()->role, $roles)) {
            Auth::logout();
            return redirect()->route('index');
        }

        return $next($request);
    }
}
