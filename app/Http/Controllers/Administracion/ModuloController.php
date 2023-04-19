<?php

namespace App\Http\Controllers\Administracion;

use App\Http\Controllers\Controller;
use App\Models\Administracion\Modulo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use stdClass;

class ModuloController extends Controller
{

    public function __construct() {
        $this->middleware(['role:administracion_usuarios']);
    }

    public function index(Request $request)
    {
        $data = new stdClass();
        $data->pid = $request->param1;
        return view::make('pages.administracion.item.modulo.index')->with('data',$data);
    }

    public function dataTable($id){
        $item = new Modulo();
        return Datatables($item->dataTables($id))->toJson();
    }

    public function edit($id, $type, $pid)
    {
        $data = new stdClass();
        $item = new Modulo();

        if($type == 'update'){
            $data->id = $id;
            $data->type = $type;
            $data->item = Modulo::find($id);
        }else{
            $data->type = 'new';
        }
        $data->pid = $pid;
        $data->roles = $item->catalogoRol($pid);
        //dd($data);

        return View::make('pages.administracion.item.modulo.modal')->with('data', $data);
    }

    public function store(Request $request)
    {
        $res = new stdClass();
        $data = $request->item;
        $data['model_type'] = 'App\Models\Administracion\User';

        try {
            Modulo::updateOrCreate(['id' => $request->id], $data);
            $res->id = 1;
        } catch (\Exception $e) {
            $res->id = 0;
        }
        $res->type = $request->type;

        return response()->json($res);
    }

    public function destroy($id)
    {
        $data = Modulo::find($id);
        $modulo = new Modulo();
        $res = $modulo->existeRegitro($data->role_id, $data->model_id);
        if ($res == 0 ){
            try {
                Modulo::destroy($id);
                $res = 1;
            } catch (\Exception $e) {
                $res = 0;
            }
        }else{
            $res = 0;
        }
        return response()->json($res);
    }

}
