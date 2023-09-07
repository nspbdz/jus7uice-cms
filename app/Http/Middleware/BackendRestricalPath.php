<?php

namespace App\Http\Middleware;

use Closure;
use DB;
use Auth;
use Schema;

class BackendRestricalPath
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
		# Get userAuth
		$user = Auth::guard('backend')->user();
		$current_path = str_replace(BACKEND_PATH,'',$request->path());
		if(in_array($current_path,json_decode($user->group->restrical_path,true))){
			# RESTRICAL
			// debug($request->header());
			
			# Render Resnponse by Json		
			if($request->header('content-type') == "application/json"){
				return response()->json([
					'status' => '503', 
					'message' => 'Service Unavailable',
					'error_message' => 'Servis is under maintenance. We will back soon!',
					// 'request' => $request->header('content-type'),
				],503);
			}
			
		
			# Render Resnponse by Jquery-load		
			if($request->header('x-requested-with') == "XMLHttpRequest"){
				// debug('request_by_jquery_load');
				return response(view('error.backend_restrical_lite'));
			}
			
			# Render Page
			return response(view('error.backend_restrical'));
		}	
		
		return $next($request);			
    }
}
