<?php

namespace App\Http\Controllers\Reporte\Resumen;
use App\Http\Controllers\Controller;
use App\Models\Reporte\Lista\Ente;
use Illuminate\Http\Request;

class EnteController extends Controller
{

    public function __construct() {
        $this->middleware(['role:reporte_resumen_item']);
    }

    public function index(Request $request)
    {
        $item = new Ente();
        $data['entes'] = $item->cantidad_ente();
        return view('pages.reporte.resumen.ente.index')->with('data', $data);
    }

}
