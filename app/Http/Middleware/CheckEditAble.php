<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class CheckEditAble
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
        if(!Auth::user()->isEdit()) return response('You do not have editation permission!');
        return $next($request);
    }
}
