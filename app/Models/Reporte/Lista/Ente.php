<?php

namespace App\Models\Reporte\Lista;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Ente extends Model
{
    protected $guarded = [];

    public function cantidad_ente()
    {
        return DB::table('empleador as e')
            ->leftJoin('catalogo_ente_gestor as ceg', 'ceg.id', '=', 'e.id_ente_gestor')
            ->select('ceg.nombre as nombre',
                DB::raw('COUNT(e.id) as cantidad'))
            ->groupBy('ceg.nombre')
            ->get();
    }




}
