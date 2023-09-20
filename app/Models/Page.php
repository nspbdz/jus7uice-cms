<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;

    protected $fillable=[
        'page',
        'content',
        'url',
        'position',
        'slug',
        'author_id',
        'status',
    ];
}
