<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdminGroup extends Model
{	
	protected $table = 'admin_group';
	protected $guarded = ['']; # set [''] biar fillable pada semua available field, auto skip jika field tak available.
}
