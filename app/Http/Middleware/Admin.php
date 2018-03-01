<?php

use Illuminate\Support\Facades\Auth;
namespace App\Http\Middleware;
// use App\User;
use Closure;
use Auth;

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
        if ( Auth::user() && Auth::user()->user_role == 1 )
        {
            return $next($request);
        }elseif (Auth::user()->user_role == 2) {
            return redirect('/')->with('error', 'Unauthorized Page');
        }else {
            return redirect('/');
        }
            return redirect()->guest('/dashboard');
        // return $next($request);
    }
}
