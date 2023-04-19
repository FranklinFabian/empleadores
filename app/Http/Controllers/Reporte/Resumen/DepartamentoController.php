<?php

namespace App\Http\Controllers\Reporte\Resumen;
use App\Http\Controllers\Controller;
use App\Models\Reporte\Lista\Departamento;
use Illuminate\Http\Request;

class DepartamentoController extends Controller
{

    public function __construct() {
        $this->middleware(['role:reporte_resumen_item']);
    }

    public function index(Request $request)
    {
        $item = new Departamento();
        $data['departamentos'] = $item->cantidad_departamento();

        return view('pages.reporte.resumen.departamento.index')->with('data', $data);
    }
}
