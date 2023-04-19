<?php

namespace App\Http\Controllers\Administracion;

use App\Http\Controllers\Controller;
use App\Models\Administracion\Asignacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use stdClass;

class AsignacionController extends Controller
{

    public function __construct() {
        $this->middleware(['role:administracion_usuarios']);
    }

    public function index(Request $request)
    {
        $data = new stdClass();
        $data->pid = $request->param1;
        return view::make('pages.administracion.item.asignacion.index')->with('data',$data);
    }

    public function dataTable($id){
        $item = new Asignacion();
        return Datatables($item->dataTables($id))->toJson();
    }

    public function edit($id, $type, $pid)
    {
        $data = new stdClass();
        $item = new Asignacion();

        if($type == 'update'){
            $data->id = $id;
            $data->type = $type;
            $data->item = Asignacion::find($id);
        }else{
            $data->type = 'new';
        }
        $data->pid = $pid;
        $data->entes = $item->catalogoEnte($pid);
        //dd($data);

        return View::make('pages.administracion.item.asignacion.modal')->with('data', $data);
    }

    public function store(Request $request)
    {
        $res = new stdClass();
        $data = $request->item;

        try {
            Asignacion::updateOrCreate(['id' => $request->id], $data);
            $res->id = 1;
        } catch (\Exception $e) {
            $res->id = 0;
        }
        $res->type = $request->type;

        return response()->json($res);
    }

    public function destroy($id)
    {
        try {
            Asignacion::destroy($id);
            $res = 1;
        } catch (\Exception $e) {
            $res = 0;
        }
        return response()->json($res);
    }

}
