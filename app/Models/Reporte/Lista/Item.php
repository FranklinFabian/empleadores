<?php

namespace App\Models\Reporte\Lista;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Item extends Model
{
    protected $guarded = [];

    protected  $table = 'empleador';

    public function dataTables($id){
        return DB::table('empleador as e')
            ->leftJoin('catalogo_ente_gestor as ceg', 'ceg.id', '=', 'e.id_ente_gestor')
            ->leftJoin('usuario_ente as ue', 'ue.id_ente_gestor', '=', 'ceg.id')
            ->leftJoin('users as u', 'u.id', '=', 'ue.id_usuario')
            ->leftJoin('catalogo_departamento as cd', 'cd.id', '=', 'e.id_departamento')
            ->leftJoin('catalogo_estado_empleador as cee', 'cee.id', '=', 'e.id_estado')
            ->select('e.id as id',
                'e.razon_social as razon_social',
                'cee.nombre as estado',
                'ceg.nombre as ente',
                'cd.nombre as departamento'

                //DB::raw('DATE_FORMAT( a.fecha, "%d-%m-%Y") as fecha'
            )
            ->where('u.id','=',$id)
            ->orderBy('e.id', 'DESC');
    }

    public function obtenerData($id){
        return DB::table('empleador as e')
            ->leftJoin('catalogo_ente_gestor as ceg', 'ceg.id', '=', 'e.id_ente_gestor')
            ->leftJoin('catalogo_departamento as cd', 'cd.id', '=', 'e.id_departamento')
            ->leftJoin('catalogo_estado_empleador as cee', 'cee.id', '=', 'e.id_estado')
            ->select('e.id as id',
                'ceg.nombre as ente_gestor',
                'e.razon_social as razon_social',
                'e.numero_patronal as numero_patronal',
                'cd.nombre as departamento',
                'e.localidad as localidad',
                'e.zona as zona',
                'e.calle as calle',
                'e.numero as numero',
                'e.telefono as telefono',
                'e.representante_legal as representante_legal',
                DB::raw('DATE_FORMAT( e.fecha_inicio_actividades, "%d-%m-%Y") as fecha_inicio_actividades'),
                'e.actividad_economica as actividad_economica',
                'e.numero_trabajadores as numero_trabajadores',
                'e.nit as nit',
                DB::raw('DATE_FORMAT( e.fecha_afiliacion, "%d-%m-%Y") as fecha_afiliacion'),
                'cee.nombre as estado'
            )
            ->where('e.id','=',$id)
            ->first();
    }



}
