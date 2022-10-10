<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (auth()->user()?->utype=='AD') {
            return $next($request);
        } else {
            session()->flush();
            return redirect('login');
        }
    }
}
