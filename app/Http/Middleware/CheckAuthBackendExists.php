<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use View;

use App\Routes;

class CheckAuthBackendExists
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
        if (Auth::guard('backend')->check()) {
            return redirect()->intended(BACKEND_PATH);   
        }
		
		return $next($request);
    }
}
