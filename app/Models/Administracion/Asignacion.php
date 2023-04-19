<?php

namespace App\Models\Administracion;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Asignacion extends Model
{
    protected $guarded = [];

    protected  $table = 'usuario_ente';


    public function dataTables($id){
        return DB::table('usuario_ente as ue')
            ->leftJoin('catalogo_ente_gestor as ceg', 'ceg.id', '=', 'ue.id_ente_gestor')
            ->select('ue.id',
                'ceg.nombre as nombre')
            ->where('ue.id_usuario','=',$id)
            ->orderBy('ue.id', 'ASC');
    }


    public function catalogoEnte($id)
    {
        return DB::table('catalogo_ente_gestor as ceg')
            ->leftJoin('usuario_ente as ue', function ($join) use ($id) {
                $join->on('ue.id_ente_gestor', '=', 'ceg.id')
                    ->where('ue.id_usuario', '=', $id);
            })
            ->select('ceg.id as id',
                'ceg.nombre as nombre')
            ->whereNull('ue.id_ente_gestor')
            ->orderBy('ue.id', 'DESC')
            ->get();
    }

}
