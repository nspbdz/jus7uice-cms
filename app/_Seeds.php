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
        $this->_insert_table_admin_content();
        $this->_insert_table_admin_widget();
    }

    /* Admin article */

    function _insert_table_admin_widget()
    {
        if (Schema::hasTable('widgets')) {
            if (DB::table('widgets')->count() <= 0) {

                $data = ['weekly_news', 'news', 'banner', 'test1', 'test2', 'test3'];
                $dataUrl = json_encode(['', 'about', 'services', 'portfolio', 'team', 'contact']);
                
                // dd($data[0]);
                for ($i = 0; $i < 6; $i++) {
                    DB::table('widgets')->insert([
                        "id" => $i + 1,
                        "name" => $data[$i],
                        "url" => $dataUrl,
                        "article_id" => $i + 1,
                        "created_at" => now(),
                        "updated_at" => now(),
                        "status" => 1,
                    ]);
                }
            }
        }
    }


    /* Admin article */

    function _insert_table_admin_navbar()
    {
        if (Schema::hasTable('navbars')) {
            if (DB::table('navbars')->count() <= 0) {

                $data = ['Home', 'About', 'Services', 'Portfolio', 'Team', 'Contact'];
                $dataSlug = ['', 'about', 'services', 'portfolio', 'team', 'contact'];
                $dataUrl = ['/', '/about', '/services', '/portfolio', '/team', '/contact'];
                // dd($data[0]);
                for ($i = 0; $i < 6; $i++) {
                    DB::table('navbars')->insert([
                        "id" => $i + 1,
                        "title" => $data[$i],
                        "slug" => $dataSlug[$i],
                        "url" => $dataUrl[$i],
                        "position" => $i,
                        "created_at" => now(),
                        "updated_at" => now(),
                        "status" => 1,
                    ]);
                }
            }
        }
    }

    /* Admin content */

    function _insert_table_admin_content()
    {
        if (Schema::hasTable('contents')) {
            if (DB::table('contents')->count() <= 0) {
                $dataSlug = ['', 'about', 'services', 'portfolio', 'team', 'contact'];
                for ($i = 0; $i < 6; $i++) {
                    DB::table('contents')->insert([
                        "id" => $i + 1,
                        "title" => 'title' . $i,
                        "content" => 'content' . $i,
                        "slug" => $dataSlug[$i],
                        "author_id" => 1, // Gantilah dengan ID penulis yang sesuai
                        "created_at" => now(),
                        "updated_at" => now(),
                        "status" => 1,
                    ]);
                }
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
