<?php

namespace App\Models\Administracion;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Modulo extends Model
{
    protected $guarded = [];

    protected  $table = 'model_has_roles';

    public $timestamps = false;

    public function dataTables($id){
        return DB::table('model_has_roles as mhr')
            ->leftJoin('roles as r', 'r.id', '=', 'mhr.role_id')
            ->select('mhr.id',
                'r.id as codigo',
                'r.section as modulo')
            ->where('mhr.model_id','=',$id)
            ->where('r.padre','=',0)
            ->where('r.id_estado','=',1)
            ->orderBy('r.padre', 'ASC')
            ->orderBy('r.order', 'ASC');
    }

    public function catalogoRol($id){
        return DB::table('roles as r')
            ->leftJoin('model_has_roles as mhr', function ($join) use ($id){
                $join->on('mhr.role_id','=','r.id')
                    ->where('mhr.model_id','=',$id);
            })
            ->select('r.id as id',
                'r.section as modulo')
            ->whereNull('mhr.role_id')
            ->where('r.padre','=',0)
            ->where('r.id_estado','=',1)
            ->orderBy('mhr.id', 'DESC')
            ->get();
    }

    public function existeRegitro($rol, $user){
        return DB::table('model_has_roles as mhr')
            ->leftJoin('roles as r', 'r.id', '=', 'mhr.role_id')
            ->select('mhr.*')
            ->where('r.padre','=',$rol)
            ->where('mhr.model_id','=',$user)
            ->count();
    }

}
