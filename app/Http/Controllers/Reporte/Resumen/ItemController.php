<?php

namespace App\Http\Controllers\Reporte\Resumen;

use App\Http\Controllers\Controller;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use stdClass;

class ItemController extends Controller
{

    public function __construct() {
        $this->middleware(['role:reporte_resumen_item']);
    }

    public function index(Request $request)
    {
        $data = new stdClass();
        $data->page_title = 'Reporte - Resumen';
        $data->page_description = 'Reporte - Resumen';
        return view('pages.reporte.resumen.index')->with('data', $data);
    }

    public function fichaPdf(){
        $id = Auth::user()->id;

        $item = new Item();

        $data['principal'] = $item->obtenerPrincipal($id);
        $data['formaciones'] = $item->obtenerFormacion($data['principal']->id);
        $data['formacioncomplementarias'] = $item->obtenerFormacionComplementaria($data['principal']->id);
        $data['experiencias'] = $item->obtenerExperiencia($data['principal']->id);
        $data['idiomas'] = $item->obtenerIdioma($data['principal']->id);
        $data['competencias'] = $item->obtenerCompetencia($data['principal']->id);
        $data['referencias'] = $item->obtenerReferencia($data['principal']->id);

        //dd($data);

        $pdf = PDF::loadView('pages.empleabilidad.curriculo.pdf', $data);

        return $pdf->download('ficha_curriculo.pdf');
    }

    public function destroy($id)
    {
        try {
            Item::destroy($id);
            $res = 1;
        } catch (\Exception $e) {
            $res = 0;
        }

        return response()->json($res);
    }

}
