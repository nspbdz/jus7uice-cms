<?php

namespace App;

use Schema;
use DB;
use Faker\Provider\Lorem;
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
        $this->_insert_table_admin_article_widget();
        $this->_insert_table_admin_widget_navbar();
        $this->_insert_table_admin_page();
    }

    function _insert_table_admin_page()
    {
        if (Schema::hasTable('pages')) {
            if (DB::table('pages')->count() <= 0) {

                $data = ['Home', 'About', 'Services', 'Portfolio', 'Team', 'Contact'];
                $dataSlug = ['home', 'about', 'services', 'portfolio', 'team', 'contact'];
                $dataUrl = ['/home', '/about', '/services', '/portfolio', '/team', '/contact'];


                $htmlContent = <<<EOL
                                <div>
                                    <div>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Veritatis possimus nam sit! Dignissimos temporibus sint nostrum tenetur earum? Blanditiis, beatae sit! Numquam praesentium amet quos ipsam assumenda consequuntur, deleniti commodi!</div>
                                    <div>Lorem ipsum dolor sit amet consectetur adipisicing elit. Earum et facere illo, sed quisquam totam harum suscipit deserunt, rem, repudiandae impedit maiores quae eius nisi tenetur magni tempore. Repellendus, ducimus.</div>
                                    <div>Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum, accusantium rem porro dolores facilis libero saepe quam odio consectetur recusandae. Optio odio facere, quam nostrum nulla quis veniam inventore deleniti.</div>
                                </div>
                                EOL;

                // dd($content);
                for ($i = 0; $i < 6; $i++) {
                    DB::table('pages')->insert([
                        "id" => $i + 1,
                        "page" => $data[$i],
                        "slug" => $dataSlug[$i],
                        "url" => "/page". $dataUrl[$i],
                        "content" => $htmlContent,
                        "position" => $i,
                        "created_at" => now(),
                        "updated_at" => now(),
                        "status" => 1,
                    ]);
                }
            }
        }
    }


    /* Admin article widget */

    function _insert_table_admin_widget_navbar()
    {
        if (Schema::hasTable('widget_navbars')) {
            if (DB::table('widget_navbars')->count() <= 0) {

                $dataArticle = [2, 3, 4, 5, 6];
                $dataWidget = [2, 3, 4, 5, 6];

                // dd($data[0]);
                for ($i = 0; $i < count($dataArticle); $i++) {
                    DB::table('widget_navbars')->insert([
                        "id" => $i + 1,
                        "page_id" => $dataArticle[$i],
                        "widget_id" => 1,
                        "created_at" => now(),
                        "updated_at" => now(),
                    ]);
                }

                for ($j = 0; $j < count($dataArticle); $j++) {
                    DB::table('widget_navbars')->insert([
                        "id" => 7 + $j,
                        "page_id" => $dataArticle[$j],
                        "widget_id" => 3,
                        "created_at" => now(),
                        "updated_at" => now(),
                    ]);
                }
            }
        }
    }

    /* Admin article widget */

    function _insert_table_admin_article_widget()
    {
        if (Schema::hasTable('article_widgets')) {
            if (DB::table('article_widgets')->count() <= 0) {

                $dataArticle = [1, 2, 3, 4, 5, 6];
                $dataWidget = [1, 2, 3, 4, 5, 6];

                // dd($data[0]);
                for ($i = 0; $i < 6; $i++) {
                    DB::table('article_widgets')->insert([
                        "id" => $i + 1,
                        "article_id" => $dataArticle[$i],
                        "widget_id" => 1,
                        "created_at" => now(),
                        "updated_at" => now(),
                    ]);
                }
            }
        }
    }

    /* Admin widget */

    function _insert_table_admin_widget()
    {
        if (Schema::hasTable('widgets')) {
            if (DB::table('widgets')->count() <= 0) {

                $data = ['weekly_news', 'news', 'banner', 'test1', 'test2', 'test3'];
                $dataUrl = json_encode(['', 'about', 'services', 'portfolio', 'team', 'contact']);
                $dataArticle = json_encode([1, 2, 3, 4, 5]);

                // dd($data[0]);
                for ($i = 0; $i < 6; $i++) {
                    DB::table('widgets')->insert([
                        "id" => $i + 1,
                        "name" => $data[$i],
                        "slug" => $data[$i],
                        "created_at" => now(),
                        "updated_at" => now(),
                        "status" => 1,
                    ]);
                }
            }
        }
    }


    /* Admin navbar */

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
                    "url" => 'article/test_article',
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
