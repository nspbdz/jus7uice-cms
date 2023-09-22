<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WidgetPage extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'widget_id',
        'page_id',
    ];

    public function widget()
    {
        return $this->belongsTo(Widget::class, 'widget_id');
    }

    public function navbar()
    {
        return $this->belongsTo(Navbar::class, 'navbar_id');
    }

    public function page()
    {
        return $this->belongsTo(Navbar::class, 'page_id');
    }

}
