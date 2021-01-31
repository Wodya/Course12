<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Admin
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
    	$user = \Auth::user();
    	if((bool)$user->is_admin === true) {
            return $next($request);
    	}

    	return redirect()->route('account');
    }
}
