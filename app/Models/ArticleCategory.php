<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArticleCategory extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'article_id',
        'category_id',
    ];

    public function article()
    {
        return $this->belongsTo(Article::class, 'category');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    // public function widget()
    // {
    //     return $this->belongsTo(Widget::class, 'navbar');
    // }

    // public function navbar()
    // {
    //     return $this->belongsTo(Navbar::class, 'navbar_id');
    // }
}
