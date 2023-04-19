<?php

namespace App\Http\Controllers\Reporte\Resumen;
use App\Http\Controllers\Controller;
use App\Models\Reporte\Lista\Total;
use Illuminate\Http\Request;

class TotalController extends Controller
{

    public function __construct() {
        $this->middleware(['role:reporte_resumen_item']);
    }

    public function index(Request $request)
    {
        $item = new Total();

        $data['entes_departamentos'] = $item->ente_departamento();

        return view('pages.reporte.resumen.total.index')->with('data', $data);
    }

}
