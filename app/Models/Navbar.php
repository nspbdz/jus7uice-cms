<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class Navbar extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'title',
        'url',
        'position',
    ];

    public function widgets()
    {
        return $this->belongsToMany(Widget::class, 'widget_navbars', 'navbar_id', 'widget_id');
    }


    

   
}
