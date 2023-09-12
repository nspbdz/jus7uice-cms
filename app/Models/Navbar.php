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

    public function datatables($limit = null, $start = null, $search = null, $orderCol = null, $orderDir = null)
    {
        $query = DB::table('navbars')
            ->select(
                'navbars.id as id',
                'navbars.title as title',
                'navbars.url as url',
            )
            ->where('status', 1);
        if ($orderCol != null && $orderDir !=  null) {
            $query->orderBy('navbars.' . $orderCol, $orderDir);
        } else {
            $query->orderBy('navbars.position', 'asc');
        }


        if ($search != null) {
            $query->where(function ($query) use ($search) {
                $query->where(DB::raw('lower(navbars.title)'), 'LIKE', '%' . $search . '%');
                $query->orwhere(DB::raw('lower(navbars.url)'), 'LIKE', '%' . $search . '%');
            });
        }
        $query->orderBy('position', 'ASC');
        $query->offset($start)->limit($limit);
        return  $query->get();
    }

    public function countCampaign($search = null)
    {
        $query = DB::table('navbars');
        if ($search != null) {
            $query->where(function ($query) use ($search) {
                $query->where(DB::raw('lower(navbars.title)'), 'LIKE', '%' . $search . '%');
                $query->orwhere(DB::raw('lower(navbars.url)'), 'LIKE', '%' . $search . '%');
            });
        }
        return $query->count();
    }
}
