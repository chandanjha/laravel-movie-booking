<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class rolecheck
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
        // fetch user role from authorised user logined
        $userRole = auth()->user()->user_role;

        //if user role is admin pass else redirect to home
        if($userRole == 'admin'){
            return $next($request);
        }
        else 
        {
            return redirect('/');

        }

        
    }
}
