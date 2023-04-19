<?php

namespace App\Models\Reporte\Lista;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Departamento extends Model
{
    protected $guarded = [];


    public function cantidad_departamento()
    {
        return DB::table('empleador as e')
            ->leftJoin('catalogo_departamento as cd', 'cd.id', '=', 'e.id_departamento')
            ->select('cd.nombre as nombre',
                DB::raw('COUNT(e.id) as cantidad'))
            ->groupBy('cd.nombre')
            ->get();
    }


}
