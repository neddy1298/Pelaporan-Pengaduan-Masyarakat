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
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        switch ($guard) {
            case 'petugas':
                if (Auth::guard($guard)->check()) {
                    return redirect()->route('petugas.dashboard');
                }

                // case 'masyarakat':
                //     if (Auth::guard($guard)->check()) {
                //         return redirect()->route('masyarakat.dashboard');
                //     }

            default:
                if (Auth::guard($guard)->check()) {
                    return redirect('/');
                }
                break;
        }

        return $next($request);
    }
}
