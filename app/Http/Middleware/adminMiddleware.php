<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class adminMiddleware
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

        if (Auth::check()) {
            
            if (Auth::user()->role_as == '1' || Auth::user()->role_as == '2' )//1== admin && 0==Common Users
            {
                return $next($request);
            }
            else
            {
                return redirect('/home')->with('message','Access Denied As You Are Not A Administrator');
            }
        }
        else
        {
            return redirect('/login')->with('message','Please Login First');
        }
  
    }
}
