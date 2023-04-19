<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Menu extends Model
{
    protected $guarded = [];

    public function getMenu ($id){
        return DB::table('model_has_roles as mhr')
            ->leftJoin('roles as r', 'r.id', '=', 'mhr.role_id')
            ->where('r.padre','=',0)
            ->where('mhr.model_id','=',$id)
            ->where('r.id_estado','=',1)
            ->select('r.id',
                'r.section'
            )
            ->orderBy('order', 'asc')
            ->get();
    }


    public function getSubMenu ($id, $userid){
        return DB::table('model_has_roles as mhr')
            ->leftJoin('roles as r', 'r.id', '=', 'mhr.role_id')
            ->where('r.padre','=',$id)
            ->where('mhr.model_id','=',$userid)
            ->where('r.id_estado','=',1)
            ->select('r.title',
            'r.root',
            'r.icon',
            'r.page',
            'r.newtab')
            ->orderBy('order', 'asc')
            ->get();
    }

}
