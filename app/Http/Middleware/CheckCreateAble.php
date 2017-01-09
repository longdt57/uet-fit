<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class CheckCreateAble
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
        if(!Auth::user()->isCreate()) return response('You do not have creation permission!');
        return $next($request);
    }
}
