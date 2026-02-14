<?php

namespace App\Http\Middleware;

use App\Enums\Role;
use Closure;
use Illuminate\Http\Request;

class AuthenticateRoutes
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        if(auth()->user() && auth()->user()->role_id == Role::TENANT) {

            return redirect()->route('customer.dashboard');
        }

        if (env('LANDLORD_PORTAL')){
            if(auth()->user() && auth()->user()->role_id == Role::LANDLORD) {
                return redirect()->route('landlord.summary');
            }
        }

        return $next($request);
    }
}
