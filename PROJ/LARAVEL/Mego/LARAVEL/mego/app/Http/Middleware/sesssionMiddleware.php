<?php

namespace App\Http\Middleware;

use Closure;

//added
use Session;

class sesssionMiddleware
{
    public function handle($request, Closure $next)
    {
		if(!Session::has('user_id')){
			return redirect('/');
		}
        return $next($request);
    }
}
