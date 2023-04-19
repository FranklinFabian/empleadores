<?php

namespace App\Models\Ente\Formulario;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Movimiento extends Model
{
    protected $guarded = [];

    protected  $table = 'movimiento';

    public function dataTables($id){
        return DB::table('movimiento as m')
            ->leftJoin('catalogo_estado_empleador as cee', 'cee.id', '=', 'm.id_estado')
            ->select('m.id as id',
                'cee.nombre as estado_empleador',
                DB::raw('DATE_FORMAT( m.fecha, "%d-%m-%Y") as fecha')
            )
            ->where('m.id_empleador','=',$id)
            ->orderBy('m.id', 'DESC');
    }




}
