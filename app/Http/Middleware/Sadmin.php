<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Closure;

class Sadmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next=null,$guard=null)
    {
        if (Auth::guard($guard)->check()) {
            return $next($request);
                return('/');
        }else {
            return redirect('/sadmin/login');
        }
       
    }
}
