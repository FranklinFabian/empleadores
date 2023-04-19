<?php

namespace App\Http\Controllers\Reporte\Resumen;
use App\Http\Controllers\Controller;
use App\Models\Reporte\Lista\General;
use Illuminate\Http\Request;

class GeneralController extends Controller
{

    public function __construct() {
        $this->middleware(['role:reporte_resumen_item']);
    }

    public function index(Request $request)
    {
        $item = new General();
        $data['departamentos'] = $item->cantidad_departamento();
        $data['entes'] = $item->cantidad_ente();
        $data['entes_departamentos'] = $item->ente_departamento();

        return view('pages.reporte.resumen.general.index')->with('data', $data);
    }

    public function grafico_dinamico(){

        $item = new General();

        $serie = $item->grafico_dinamico();

        $data['categoria'] = explode(',',$serie->departamento);

        $data['serie'][0]['name'] = 'Activo';
        $data['serie'][0]['data'] = explode(',',$serie->activo);

        $data['serie'][1]['name'] = 'Mora';
        $data['serie'][1]['data'] = explode(',',$serie->mora);

        $data['serie'][2]['name'] = 'Baja Temporal';
        $data['serie'][2]['data'] = explode(',',$serie->baja_temporal);

        $data['serie'][3]['name'] = 'Baja Definitiva';
        $data['serie'][3]['data'] = explode(',',$serie->baja_definitiva);

        return response()->json($data);
    }

    public function grafico_dinamicodos(){

        $item = new General();

        $serie = $item->grafico_dinamicodos();

        $data['categoria'] = explode(',',$serie->departamento);

        $data['serie'][0]['name'] = 'Activo';
        $data['serie'][0]['data'] = explode(',',$serie->activo);

        $data['serie'][1]['name'] = 'Mora';
        $data['serie'][1]['data'] = explode(',',$serie->mora);

        $data['serie'][2]['name'] = 'Baja Temporal';
        $data['serie'][2]['data'] = explode(',',$serie->baja_temporal);

        $data['serie'][3]['name'] = 'Baja Definitiva';
        $data['serie'][3]['data'] = explode(',',$serie->baja_definitiva);

        return response()->json($data);
    }




}
