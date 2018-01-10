<?php

namespace App\Http\Middleware;
use Closure;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = 'user')
    {
        if(!auth()->guard($guard)->check()){
            return Redirect::back()->with('message','No tiene los permisos necesarios para realizar esa acción');
        }
        return $next($request);
    }
}
