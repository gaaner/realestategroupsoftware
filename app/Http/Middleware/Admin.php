<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //Check for Auth and Admin User level
        if(Auth::check() && Auth::user()->level == 9) {
            return $next($request);
        }

        return redirect()->route('admin.login')->withErrors('Por favor, faça o login novamente.');
    }
}
