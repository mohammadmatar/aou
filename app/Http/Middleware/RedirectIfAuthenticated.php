<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        /*  if (Auth::guard($guard)->check()) {
        return redirect('/');
        }
        return $next($request);
        } */

       
         switch ($guard) {
            case 'admin':
                if (Auth::guard($guard)->check()) {
                    return redirect()->route('admin.dashboard');
                }
                break;

            case 'subadmin':
                if (Auth::guard($guard)->check()) {
                    return redirect()->route('sub_admin.dashboard');
                }
                break;
            case 'student':
                if (Auth::guard($guard)->check()) {
                    return redirect()->route('student.profile');
                }
                break;
            case 'instructor':
                if (Auth::guard($guard)->check()) {
                    return redirect()->route('instructor.profile');
                }
                break;

            default:
                if (Auth::guard($guard)->check()) {
                    return redirect('/');
                }
                break;
        }

        return $next($request);
    }
}
