<?php

namespace App\Models\Reporte\Lista;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class General extends Model
{
    protected $guarded = [];

    public function grafico_dinamico()
    {
        return DB::table('vista_estado_departamento as ved')
            ->select('*')
            ->first();
    }

    public function grafico_dinamicodos()
    {
        return DB::table('vista_estado_departamento2 as ved')
            ->select('*')
            ->first();
    }

    public function grafico_dinamicotres()
    {
        return DB::table('vista_estado_departamento as ved')
            ->select('*')
            ->first();
    }


    public function cantidad_departamento()
    {
        return DB::table('empleador as e')
            ->leftJoin('catalogo_departamento as cd', 'cd.id', '=', 'e.id_departamento')
            ->select('cd.nombre as nombre',
            DB::raw('COUNT(e.id) as cantidad'))
            ->groupBy('cd.nombre')
            ->get();
    }

    public function cantidad_ente()
    {
        return DB::table('empleador as e')
            ->leftJoin('catalogo_ente_gestor as ceg', 'ceg.id', '=', 'e.id_ente_gestor')
            ->select('ceg.nombre as nombre',
                DB::raw('COUNT(e.id) as cantidad'))
            ->groupBy('ceg.nombre')
            ->get();
    }

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
