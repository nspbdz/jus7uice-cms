<?php
namespace App;
use Schema;
use DB;
use Hash;

class _Migrations {

	function __construct() {
		$this->_check_db_exists();


		$this->_create_table_admin();
		$this->_create_table_admin_group();

		$this->_create_table_user();
		#article
		$this->_create_table_articles();

        #navbar
		$this->_create_table_navbars();

		# Media
		$this->_create_table_media_album();
		$this->_create_table_media();

		# Logging
		$this->_create_table_backendlog();
		$this->_create_table_frontendlog();
		$this->_create_table_activitylog();





	}

	/* Check DB */
	function _check_db_exists()
	{
		try{
			DB::connection()->getPdo();
		} catch(\Exception $e){
			die("Failed to establish connection to the server");
		}
	}

    	/* Tbl navbar */

	function _create_table_navbars(){
		$table = "navbars";
		$r = "
		CREATE TABLE ".$table." (
			`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
			`title` varchar(100) NOT NULL,
			`url` varchar(100) NOT NULL,
			`position` int(10) NOT NULL,
			`created_at` datetime DEFAULT NULL,
			`updated_at` datetime DEFAULT NULL,
			`status` tinyint(1) unsigned NOT NULL DEFAULT '1',
			PRIMARY KEY (`id`)
		) ENGINE=InnoDB  DEFAULT CHARSET=utf8;
		";
		if(!Schema::hasTable($table)){	DB::statement($r);	}
	}

	/* Tbl article */

	function _create_table_articles(){
		$table = "articles";
		$r = "
		CREATE TABLE ".$table." (
			`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
			`title` varchar(100) NULL DEFAULT NULL,
			`thumbnail` varchar(100) NULL DEFAULT NULL,
			`content` text,
			`author_id` int(10) unsigned NULL DEFAULT '0',
			`created_at` datetime DEFAULT NULL,
			`updated_at` datetime DEFAULT NULL,
			`status` tinyint(1) unsigned NOT NULL DEFAULT '1',
			PRIMARY KEY (`id`)
		) ENGINE=InnoDB  DEFAULT CHARSET=utf8;
		";
		if(!Schema::hasTable($table)){	DB::statement($r);	}
	}

	/* Tbl Admin */
	function _create_table_admin()
	{
		$table = "admin";
		$r = "
		CREATE TABLE ".$table." (
		  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
		  `admin_group_id` int(10) unsigned DEFAULT NULL,
		  `username` varchar(100) DEFAULT NULL,
		  `password` varchar(200) DEFAULT NULL,
		  `avatar` varchar(100) DEFAULT NULL,
		  `name` varchar(50) DEFAULT NULL,
		  `email` varchar(50) DEFAULT NULL,
		  `is_superadmin` tinyint(1) DEFAULT '0',
		  `remember_token` varchar(100) DEFAULT NULL,
		  `recovery_token` varchar(100) DEFAULT NULL,
		  `theme` varchar(100) DEFAULT NULL,
		  `login_session` varchar(200) DEFAULT NULL,
		  `created_at` datetime DEFAULT NULL,
		  `updated_at` datetime DEFAULT NULL,
		  `status` tinyint(1) unsigned DEFAULT '1',
		  PRIMARY KEY (`id`)
		) ENGINE=InnoDB  DEFAULT CHARSET=utf8;
		";
		if(!Schema::hasTable($table)){	DB::statement($r);	}
	}

	function _create_table_admin_group(){
		$table = "admin_group";
		$r = "
		CREATE TABLE ".$table." (
			`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
			`name` varchar(100) NULL DEFAULT NULL,
			`parent` int(11) unsigned NULL DEFAULT '0',
			`restrical_path` text,
			`params` text,
			`date` int(14) unsigned NULL DEFAULT '0',
			`created_at` datetime DEFAULT NULL,
			`updated_at` datetime DEFAULT NULL,
			`status` tinyint(1) unsigned NOT NULL DEFAULT '1',
			PRIMARY KEY (`id`)
		) ENGINE=InnoDB  DEFAULT CHARSET=utf8;
		";
		if(!Schema::hasTable($table)){	DB::statement($r);	}
	}


	function _create_table_user(){
		$table = "users";
		$r = "
		CREATE TABLE ".$table." (
			`id` bigint(21) unsigned NOT NULL AUTO_INCREMENT,
			`uuid` varchar(50) DEFAULT NULL,

			`name` varchar(200) NULL DEFAULT NULL,
			`username` varchar(200) NULL DEFAULT NULL,
			`email` varchar(200) NULL DEFAULT NULL,
			`password` varchar(255) NULL DEFAULT NULL,

			`cover_image_url` varchar(255) DEFAULT NULL,
			`photo_url` varchar(255) DEFAULT NULL,
			`photo_thumb_url` varchar(255) DEFAULT NULL,

			`remember_token` varchar(100) DEFAULT NULL,
			`recovery_token` varchar(100) DEFAULT NULL,

			`login_session` varchar(200) DEFAULT NULL,
			`theme` varchar(100) DEFAULT NULL,
			`blocked_until` char(20) DEFAULT NULL,

			`activation_code` varchar(100) DEFAULT NULL,
			`activation_at` datetime DEFAULT NULL,

			`created_at` datetime DEFAULT NULL,
			`deleted_at` datetime DEFAULT NULL,
			`updated_at` datetime DEFAULT NULL,
			`status` tinyint(1) unsigned DEFAULT '1',
			PRIMARY KEY (`id`)
		) ENGINE=InnoDB  DEFAULT CHARSET=utf8;
		";
		if(!Schema::hasTable($table)){	DB::statement($r);	}
	}


	# Media
	function _create_table_media_album(){
		$table = "media_album";
		$r = "
		CREATE TABLE ".$table." (
			`id` int(21) unsigned NOT NULL AUTO_INCREMENT,
			`uuid` varchar(50) DEFAULT NULL,

			`title` varchar(200) NULL DEFAULT NULL,
			`description` varchar(255) DEFAULT NULL,
			`is_private` tinyint(1) unsigned DEFAULT '0',

			`params` text,
			`created_at` datetime DEFAULT NULL,
			`deleted_at` datetime DEFAULT NULL,
			`updated_at` datetime DEFAULT NULL,
			`status` tinyint(1) unsigned DEFAULT '1',
			PRIMARY KEY (`id`)
		) ENGINE=InnoDB  DEFAULT CHARSET=utf8;
		";
		if(!Schema::hasTable($table)){	DB::statement($r);	}
	}

	function _create_table_media(){
		$table = "media";
		$r = "
		CREATE TABLE ".$table." (
			`id` int(21) unsigned NOT NULL AUTO_INCREMENT,
			`uuid` varchar(50) DEFAULT NULL,

			`media_album_id` int(21) unsigned default '0',

			`title` varchar(200) NULL DEFAULT NULL,
			`description` varchar(255) DEFAULT NULL,

			`short_url` varchar(255) DEFAULT NULL,
			`media_type` char(25) DEFAULT NULL,
			`media_url` varchar(255) DEFAULT NULL,
			`media_thumb_url` varchar(255) DEFAULT NULL,

			`is_private` tinyint(1) unsigned DEFAULT '0',
			`is_favourite` tinyint(1) unsigned DEFAULT '0',

			`params` text,
			`created_at` datetime DEFAULT NULL,
			`deleted_at` datetime DEFAULT NULL,
			`updated_at` datetime DEFAULT NULL,
			`status` tinyint(1) unsigned DEFAULT '1',
			PRIMARY KEY (`id`)
		) ENGINE=InnoDB  DEFAULT CHARSET=utf8;
		";
		if(!Schema::hasTable($table)){	DB::statement($r);	}
	}




	# Logging
	function _create_table_backendlog($execute = 1, $date = ''){
		$table = 'backend_logs_' . ($date ? $date : date("Ymd"));
		$r = "CREATE TABLE IF NOT EXISTS `$table` (
			  `id` bigint(21) unsigned NOT NULL AUTO_INCREMENT,
			  `user_id` int(10) unsigned NULL DEFAULT '0',
			  `user_name` varchar(255) NULL DEFAULT NULL,
			  `title` varchar(255) NULL,
			  `method` varchar(15) NULL,
			  `url` text,
			  `description` varchar(255) NULL DEFAULT NULL,
			  `param` text,
			  `ip` varchar(255) NULL DEFAULT NULL,
			  `created_at` datetime DEFAULT NULL,
			  `updated_at` datetime DEFAULT NULL,
			  PRIMARY KEY (`id`)
			) ENGINE=InnoDB  DEFAULT CHARSET=utf8;
		";
		if(!Schema::connection('logs')->hasTable($table)){
			DB::connection('logs')->statement($r);
		}
	}

	function _create_table_frontendlog($execute = 1, $date = ''){
		$table = 'frontend_logs_' . ($date ? $date : date("Ymd"));
		$r = "CREATE TABLE IF NOT EXISTS `$table` (
			  `id` bigint(21) unsigned NOT NULL AUTO_INCREMENT,
			  `user_id` int(10) unsigned NULL DEFAULT '0',
			  `user_name` varchar(255) NULL DEFAULT NULL,
			  `title` varchar(255) NULL,
			  `method` varchar(15) NULL,
			  `url` text,
			  `description` varchar(255) NULL DEFAULT NULL,
			  `param` text,
			  `ip` varchar(255) NULL DEFAULT NULL,
			  `created_at` datetime DEFAULT NULL,
			  `updated_at` datetime DEFAULT NULL,
			  PRIMARY KEY (`id`)
			) ENGINE=InnoDB  DEFAULT CHARSET=utf8;
		";
		if(!Schema::connection('logs')->hasTable($table)){
			DB::connection('logs')->statement($r);
		}
	}

	function _create_table_activitylog($execute = 1, $date = ''){
		$table = 'activity_logs_' . ($date ? $date : date("Ymd"));
		$r = "CREATE TABLE IF NOT EXISTS `$table` (
			  `id` bigint(21) unsigned NOT NULL AUTO_INCREMENT,
			  `user_id` int(10) unsigned NULL DEFAULT '0',
			  `user_name` varchar(255) NULL DEFAULT NULL,
			  `title` varchar(255) NULL,
			  `method` varchar(15) NULL,
			  `url` text,
			  `description` varchar(255) NULL DEFAULT NULL,
			  `param` text,
			  `ip` varchar(255) NULL DEFAULT NULL,
			  `created_at` datetime DEFAULT NULL,
			  `updated_at` datetime DEFAULT NULL,
			  PRIMARY KEY (`id`)
			) ENGINE=InnoDB  DEFAULT CHARSET=utf8;
		";
		if(!Schema::connection('logs')->hasTable($table)){
			DB::connection('logs')->statement($r);
		}
	}

}
