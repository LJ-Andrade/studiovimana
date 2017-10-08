<?php

namespace App\Http\Middleware;

use Closure;
use User;
use Auth;

class admins 
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
        // Donr grant access to user resourse if not admins
        if (Auth::user()->role > 2) {
            return redirect('vadmin');
        }

        return $next($request);
    }
}
