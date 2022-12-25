<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SuperAdmin
{

    public function handle(Request $request, Closure $next)
    {
        if (Auth::check() && auth()->user()->user_type == 'admin' || auth()->user()->user_type == 'employee') {
            return $next($request);
        }
        Auth::logout();
        return redirect()->route('login');
    }
}
