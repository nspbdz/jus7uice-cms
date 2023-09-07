<?php
namespace App;
use Schema;
use DB;
use Hash;

class _Upgrade {

	function __construct() {	
		$this->_upgrade_table_backend_admin();
		$this->_upgrade_table_backend_log();
	}
	
	
	function _upgrade_table_backend_admin(){
		return true;
	}
	

	function _upgrade_table_backend_log(){
		return true;
	}
	
}