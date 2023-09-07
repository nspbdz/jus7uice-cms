<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
	use SoftDeletes;
    protected $table = 'media';
	protected $guarded = ['']; # set [''] biar fillable pada semua available field, auto skip jika field tak available.
	
	public function album()
    {
        return $this->belongsTo('\App\Models\MediaAlbum', 'media_album_id');
    }
	
}
