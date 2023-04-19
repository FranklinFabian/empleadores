<?php

namespace App\Http\Controllers\Ente\Formulario;
use App\Http\Controllers\Controller;
use App\Models\Ente\Formulario\CatalogoDepartamento;
use App\Models\Ente\Formulario\CatalogoEnte;
use App\Models\Ente\Formulario\CatalogoProducto;
use App\Models\Ente\Formulario\CatalogoServicio;
use App\Models\Ente\Formulario\Item;
use Illuminate\Http\Request;
use stdClass;

class GeneralController extends Controller
{

    public function __construct() {
        $this->middleware(['role:ente_formulario_item']);
    }

    public function index(Request $request)
    {
        $id = auth()->user()->id;
        $data = new stdClass();
        if($request->param2 == 'update'){
            $data->pid = $request->param1;
            $data->tipo = $request->param2;
            $data->item = Item::find($data->pid);
        }else{
            $data->tipo = 'new';
        }

        //$data->entes = CatalogoEnte::all();

        $item = new Item();
        $data->entes = $item->catalogo_ente($id);
        $data->departamentos = CatalogoDepartamento::all();
        $data->servicios = CatalogoServicio::all();

        return view('pages.ente.formulario.general.index')->with('data', $data);

    }

    public function store(Request $request)
    {
        $res = new stdClass();
        $data = $request->item;

       // $data['fecha_inicio_actividades'] = date('Y-m-d', strtotime($data['fecha_inicio_actividades']));
        $data['fecha_afiliacion'] = date('Y-m-d', strtotime($data['fecha_afiliacion']));
        $data['usermod'] = auth()->user()->id;
        try {
            $item = Item::updateOrCreate(['id' => $request->id], $data);
            $res->id = $item->id;
        } catch (\Exception $e) {
            $res->id = 0;
        }
        $res->tipo = $request->tipo;

        return response()->json($res);
    }
}
