<?php

namespace App\Http\Middleware;

use Closure;
use DB;
use Auth;
use Schema;

class BackendLogs
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
        /* Get Current Route */
		$user = Auth::guard('backend')->user();
		
		if (Auth::guard('backend')->check())
		{
			/* Save to Logs */
			$table = 'backend_logs_' . date("Ymd");
			
			if(!strstr($request->route()->uri(),'.data') && !strstr($request->route()->uri(),'.log')){
				if(
					strstr($request->route()->uri(),'.create') || 
					strstr($request->route()->uri(),'.edit') || 
					strstr($request->route()->uri(),'.delete')
				){
				
					$password_mask = mask_password($request->password);
					$mail_mask = hide_email($request->email);			
					$request_all = json_encode($request->all());
					$request_all = str_replace($request->password,$password_mask,$request_all);
					$request_all = str_replace($request->email,$mail_mask,$request_all);
				
					$values = [
						'user_id' => $user->id,
						'user_name' => $user->username,
						'method' => $request->route()->methods[0],
						'description' => $request->fullUrl(),
						'param' => $request_all,
						'url' => $request->fullUrl(),
						'ip' => $request->ip(),
						'created_at' => date('Y-m-d H:i:s'),
						'updated_at' => date('Y-m-d H:i:s'),
					];
			
					if(Schema::connection('logs')->hasTable($table)){
						DB::connection('logs')->table($table)->insert($values);
					}
				}
			
			}
		}
		
		return $next($request);
    }
}
