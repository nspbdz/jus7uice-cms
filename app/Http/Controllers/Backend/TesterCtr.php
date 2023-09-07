<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Curl;
use QrCode;

class TesterCtr extends Controller
{
    function getTester(Request $request){
		
	}
	function getTester2(Request $request){
		
		/* Work fine */
		echo QrCode::size(100)->generate($request->url());
	}
	
	function getTester1(Request $request){
		
		/* Work fine */
		 $response = Curl::to('https://jsonplaceholder.typicode.com/users')
        ->asJson()
        ->get();
		
		debug($response);
	}
}
