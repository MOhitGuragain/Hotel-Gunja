<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, ...$roles)
    {
        // Check if user is logged in
        if (!Auth::check()) {
            // Show a friendly error page instead of redirecting
            return response()->view('admin.errors.not-logged-in', [], 403);
        }

        // Check user roles
        if ($roles && !in_array(Auth::user()->role->name, $roles)) {
            abort(403, 'Unauthorized access');
        }

        return $next($request);
    }
}