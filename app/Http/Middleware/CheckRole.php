<?php

namespace App\Http\Middleware;

// data yang dibutuhkan 
use Illuminate\Support\Facades\Auth;

use Closure;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, ...$roles)
    {

        foreach ($roles as $role) {
            if ( $request->user()->can($role)) {
                return $next($request); // allow
            }
        }

        return abort(403, "Maaf! Anda tidak punya akses"); // deny
    }
}
