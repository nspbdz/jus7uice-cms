<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class AppCtr extends Controller
{
	function index(Request $r){
	
		return View("welcome");
	}
	
}
