<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class MigrationCtr extends Controller
{
	public function __construct()
    {
       $this->Migrations = new \App\_Migrations; // 1. Migration
       $this->Upgrade = new \App\_Upgrade; // 2. Alter
       $this->Seeds = new \App\_Seeds; // 3. Fill data
    }
	
	function index(){
		echo 'Execution Migration';
	}
	
}
