<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\Auth;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        // if ($request->is('api/*') && !Auth::check()) {
        //     return route('notLogined');
        // }
        if (!$request->expectsJson()) {

            return route('login');
        }
        if (auth()->check() && auth()->user()->role_id != 5) {
            return $next($request);
        } else {
            return redirect()->route('home');
        }
    }
}
