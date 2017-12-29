<?php

namespace App\Http\Middleware;
use Closure;
use User;
use Auth;

class AdminMiddleware
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
        // $role = Auth::user()->role;
        // if(!Auth::user()->role <= 2){
        //     return redirect('tiendalogin');
        // }
        // return $next($request);
    }
}
