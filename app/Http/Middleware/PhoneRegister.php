<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PhoneRegister
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check()) {
            if (Auth::user()->phone!=null && Auth::user()->address!=null) {
                return $next($request);
            } else {
                if (Auth::user()->role==2) {
                    return redirect()->route('juri.profile')->with('danger','Harap lengkapi profile!');
                }
                if (Auth::user()->role==1) {
                    return redirect()->route('admin.profile')->with('danger','Harap lengkapi profile!');
                }
                if (Auth::user()->role==3) {
                    return redirect()->route('funner.profile')->with('danger','Harap lengkapi profile!');
                }
            }
        } else {
            return redirect()->route('login');
        }

    }
}
