<?php

namespace App\Http\Controllers\Administracion;

use App\Http\Controllers\Controller;
use App\Models\Administracion\Submodulo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use stdClass;

class SubmoduloController extends Controller
{

    public function __construct() {
        $this->middleware(['role:administracion_usuarios']);
    }

    public function index(Request $request)
    {
        $data = new stdClass();
        $data->pid = $request->param1;
        return view::make('pages.administracion.item.submodulo.index')->with('data',$data);
    }

    public function dataTable($id){
        $item = new Submodulo();
        return Datatables($item->dataTables($id))->toJson();
    }

    public function edit($id, $type, $pid)
    {
        $data = new stdClass();
        $item = new Submodulo();

        if($type == 'update'){
            $data->id = $id;
            $data->type = $type;
            $data->item = Submodulo::find($id);
        }else{
            $data->type = 'new';
        }
        $data->pid = $pid;
        $data->modulos = $item->catalogoRol($pid);
        return View::make('pages.administracion.item.submodulo.modal')->with('data', $data);
    }

    public function store(Request $request)
    {
        $res = new stdClass();
        $data = $request->item;
        $data['model_type'] = 'App\Models\Administracion\User';

        try {
            Submodulo::updateOrCreate(['id' => $request->id], $data);
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
            Submodulo::destroy($id);
            $res = 1;
        } catch (\Exception $e) {
            $res = 0;
        }
        return response()->json($res);
    }
    public function submodulo($id, $pid){
        $item = new Submodulo();
        $data = $item->catalogoSubmoduloFiltrado($id, $pid);
        return response()->json($data);
    }

}
