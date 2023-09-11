<?php

namespace App;

use Schema;
use DB;
use Hash;

class _Seeds
{

    function __construct()
    {
        $this->_insert_table_admin();
        $this->_insert_table_admin_group();
        $this->_insert_table_admin_article();
        $this->_insert_table_admin_navbar();
    }

    /* Admin article */

    function _insert_table_admin_navbar()
    {
        if (Schema::hasTable('navbars')) {
            if (DB::table('navbars')->count() <= 0) {
                DB::table('navbars')->insert([
                    "id" => 1,
                    "title" => 'home',
                    "url" => '/home',
                    "position" => 1,
                    "created_at" =>    date("Y-m-d H:i:s"),
                    "updated_at" =>    date("Y-m-d H:i:s"),
                ]);
            }
        }
    }

    /* Admin article */

    function _insert_table_admin_article()
    {
        if (Schema::hasTable('articles')) {
            if (DB::table('articles')->count() <= 0) {
                DB::table('articles')->insert([
                    "id" => 1,
                    "title" => 'test article',
                    "thumbnail" => 'test.jpg', // Gantilah dengan nama file thumbnail yang sesuai
                    "author_id" => 1, // Gantilah dengan ID penulis yang sesuai
                    "created_at" =>    date("Y-m-d H:i:s"),
                    "updated_at" =>    date("Y-m-d H:i:s"),
                    "status" => 1,
                ]);
            }
        }
    }

    /* Admin */
    function _insert_table_admin()
    {
        if (Schema::hasTable('admin')) {
            if (DB::table('admin')->count() <= 0) {
                DB::table('admin')->insert([
                    "admin_group_id" =>    1,
                    "username" =>    'admin',
                    "password" =>    Hash::make('admin'),
                    "name" =>    'Super Admin',
                    "email" =>    '',
                    "is_superadmin" =>    1,
                    "recovery_token" =>    md5(time()),
                    "created_at" =>    date("Y-m-d H:i:s"),
                    "updated_at" =>    date("Y-m-d H:i:s"),
                    "status" =>    1,
                ]);
            }
        }
    }

    /* Admin Group */
    function _insert_table_admin_group()
    {
        if (Schema::hasTable('admin_group')) {
            if (DB::table('admin_group')->count() == 0) {
                DB::table('admin_group')->insert([
                    "name"                 =>    'Super Admin',
                    "parent"             =>    0,
                    "restrical_path" => '[]',
                    "params" => '[]',
                    "created_at" =>    date("Y-m-d H:i:s"),
                    "updated_at" =>    date("Y-m-d H:i:s"),
                    "status" =>    1,
                ]);
            }
        }
    }
}
