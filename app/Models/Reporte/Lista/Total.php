<?php

namespace App\Models\Reporte\Lista;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Total extends Model
{
    protected $guarded = [];


    public function ente_departamento()
    {
        return DB::table('empleador as e')
            ->leftJoin('catalogo_ente_gestor as ceg', 'ceg.id', '=', 'e.id_ente_gestor')
            ->select('ceg.nombre as ente_gestor',
                DB::raw('SUM(case when e.id_departamento = 1 then 1 else 0 end) as chuquisaca'),
                DB::raw('SUM(case when e.id_departamento = 2 then 1 else 0 end) as la_paz'),
                DB::raw('SUM(case when e.id_departamento = 3 then 1 else 0 end) as cochabamba'),
                DB::raw('SUM(case when e.id_departamento = 4 then 1 else 0 end) as oruro'),
                DB::raw('SUM(case when e.id_departamento = 5 then 1 else 0 end) as potosi'),
                DB::raw('SUM(case when e.id_departamento = 6 then 1 else 0 end) as tarija'),
                DB::raw('SUM(case when e.id_departamento = 7 then 1 else 0 end) as santa_cruz'),
                DB::raw('SUM(case when e.id_departamento = 8 then 1 else 0 end) as beni'),
                DB::raw('SUM(case when e.id_departamento = 9 then 1 else 0 end) as pando'))
            ->groupBy('ceg.nombre')
            ->get();
    }


}
