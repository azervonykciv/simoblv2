<?php

namespace App\Http\Middleware;

use Closure;
Use Auth;
class AdminLogged
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
        if ( Auth::check() && Auth::user()->role == 'Admin' ){
            return $next($request);
        }
        return redirect()->back();
    }
        
}
