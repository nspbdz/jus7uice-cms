<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use View;

use App\Routes;

class CheckAuthBackend
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
        if (!Auth::guard('backend')->check()) {
            return redirect()->intended(BACKEND_PATH.'login')->withErrors("Opss.. Silahkan login terlebih dahulu");   
        }
		
		$request->attributes->add(['backend_user' => json_decode(json_encode(Auth::guard('backend')->user()))]);
		return $next($request);
    }
}
