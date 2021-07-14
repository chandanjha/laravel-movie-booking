<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class checkpageinfo
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
        if(session()->has('verify'))
        {
            return $next($request);
        }
        else {
            return redirect()->back();
        }
        // return $next($request);
    }
}
