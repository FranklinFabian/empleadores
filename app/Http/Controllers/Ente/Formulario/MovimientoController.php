<?php

namespace App\Http\Controllers\Ente\Formulario;
use App\Http\Controllers\Controller;
use App\Models\Ente\Formulario\CatalogoEstadoEmpleador;
use App\Models\Ente\Formulario\Item;
use App\Models\Ente\Formulario\Movimiento;
use Illuminate\Http\Request;
use stdClass;

class MovimientoController extends Controller
{

    public function __construct() {
        $this->middleware(['role:ente_formulario_item']);
    }

    public function index(Request $request)
    {
        $data = new stdClass();
        if($request->param2 == 'update'){
            $data->pid = $request->param1;
            $data->tipo = $request->param2;
        }else{
            $data->tipo = 'new';
        }
        return view('pages.ente.formulario.movimiento.index')->with('data', $data);
    }

    public function dataTable($id){
        $item = new Movimiento();
        return Datatables($item->dataTables($id))->toJson();
    }

    public function edit($id, $type, $pid)
    {
        $data = new stdClass();

        if($type == 'update'){
            $data->id = $id;
            $data->tipo = $type;
            $data->item = Movimiento::find($id);
        }else{
            $data->tipo = 'new';
        }
        $data->pid = $pid;
        $data->estados = CatalogoEstadoEmpleador::all();
        return view('pages.ente.formulario.movimiento.modal')->with('data', $data);
    }

    public function store(Request $request)
    {
        $res = new stdClass();
        $data = $request->item;

        $data['fecha'] = date('Y-m-d');
        $dataEmpleador['id_estado'] = $data['id_estado'];


        try {
            Movimiento::updateOrCreate(['id' => $request->id], $data);
            Item::updateOrCreate(['id' => $data['id_empleador']], $dataEmpleador);

            $res->id = 1;
        } catch (\Exception $e) {
            $res->id = 0;
        }
        $res->tipo = $request->tipo;

        return response()->json($res);
    }

    public function destroy($id)
    {
        try {
            Movimiento::destroy($id);
            $res = 1;
        } catch (\Exception $e) {
            $res = 0;
        }

        return response()->json($res);
    }
}
