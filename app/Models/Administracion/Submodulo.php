<?php

namespace App\Models\Administracion;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Submodulo extends Model
{
    protected $guarded = [];

    protected  $table = 'model_has_roles';

    public $timestamps = false;

    public function dataTables($id){
        return DB::table('model_has_roles as mhr')
            ->leftjoin('roles as r', 'r.id', '=', 'mhr.role_id')
            ->leftjoin('roles as rb', 'rb.id', '=', 'r.padre')
            ->select('mhr.id',
                'rb.section as padre',
                'r.title as submodulo')
            ->where('mhr.model_id','=',$id)
            ->where('r.padre','>',0)
            ->where('r.id_estado','=',1)
            ->orderBy('r.padre', 'ASC')
            ->orderBy('r.order', 'ASC');
    }

    public function catalogoRol($pid){
        return DB::table('model_has_roles as mhr')
            ->leftJoin('roles as r', 'r.id', '=', 'mhr.role_id')
            ->select('r.id as id',
                'r.section as modulo')
            ->where('r.padre','=',0)
            ->where('r.id_estado','=',1)
            ->where('mhr.model_id','=', $pid)
            ->orderBy('r.order', 'DESC')
            ->get();
    }

    public function catalogoSubmoduloFiltrado($id, $id_usuario){
        return DB::table('roles as r')
            ->leftJoin('model_has_roles as mhr', function ($join) use ($id_usuario){
                $join->on('mhr.role_id','=','r.id')
                    ->where('mhr.model_id','=',$id_usuario);
            })
            ->select('r.id as id',
                'r.title as submodulo')
            ->whereNull('mhr.role_id')
            ->where('r.padre','=',$id)
            ->orderBy('mhr.id', 'DESC')
            ->get();
    }



}
