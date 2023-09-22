<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Widget extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'slug',
        'name',
        'status',
    ];


    public function articles()
    {
        return $this->belongsToMany(Article::class, 'article_widgets', 'widget_id', 'article_id');
    }

    public function navbars()
    {
        return $this->belongsToMany(Navbar::class, 'widget_navbars', 'widget_id', 'navbar_id');
    }

    public function page()
    {
        return $this->belongsToMany(Navbar::class, 'widget_pages', 'widget_id', 'page_id');
    }




}
