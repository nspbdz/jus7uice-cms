<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class MediaAlbum extends Model
{
	use SoftDeletes;
	protected $table = 'media_album';
	protected $guarded = ['']; # set [''] biar fillable pada semua available field, auto skip jika field tak available.
	
	public function media()
    {
        return $this->hasMany('\App\Models\Media', 'media_album_id');
    }
}
