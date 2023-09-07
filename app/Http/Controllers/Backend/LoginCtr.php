<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

use App\Models\Admin;

class LoginCtr extends Controller
{
    function getLogin(Request $request){
		return view('backend.login');
	} 
	
	
	function postLogin(Request $request){
		/* Validate */
		$request->validate([
			'username' => 'required|string|min:4',
			'password' => 'required|string|min:4',
		]);
		
		/* AUTH MAKE */
		if (Auth::guard('backend')->attempt(['username' => $request->username, 'password' => $request->password])) {
			/* Save to Logs */
			
			/* Session for 1 device login */
			$login_session =  md5(time());
			session(['login_session_backend' => $login_session]);
			Admin::where(['username' => $request->username])->update(['login_session'=>$login_session]);
			/* Redirect */
			return redirect()->intended(BACKEND_PATH);
		} else {
			
			return redirect(BACKEND_PATH.'login')->withErrors("Email atau Password tidak benar!");
		}		
		// debug($request->all());
    }
	
	
	function getLogout(Request $request){
		// Auth::logout();
		Auth::guard('backend')->logout();
		// session()->flush();
		
		if($request->has('reason')){
			if($request->reason == "ipnotallowed") return redirect("/")->withErrors(['Your IP not allowed']);
		}
        return redirect(BACKEND_PATH.'login')->with(['msg' => 'Logout sukses :)']);
	}
}
