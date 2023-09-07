<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Admin extends Authenticatable
{
    protected $table = 'admin';
	protected $guarded = ['']; # set [''] biar fillable pada semua available field, auto skip jika field tak available.
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
	
	
	public function group()
    {
        return $this->belongsTo('\App\Models\AdminGroup', 'admin_group_id');
    }
}
