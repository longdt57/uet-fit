<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class CheckIsAdmin
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
        if(Auth::user()==null ||!Auth::user()->isAdmin()) 
            return response('You are not admin!');
        return $next($request);
    }
}
