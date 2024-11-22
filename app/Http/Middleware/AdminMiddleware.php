<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::guard('user01')->check() && Auth::guard('user')->user()->role === 'admin') {
            return $next($request);
        }

        return redirect('/');
    }
}
