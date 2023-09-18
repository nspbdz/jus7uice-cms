<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'title',
        'url',
        'thumbnail',
        // 'category_id',
        'content',
        'author_id',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function widgets()
    {
        return $this->belongsToMany(Widget::class, 'article_widgets', 'article_id', 'widget_id');
    }
}
