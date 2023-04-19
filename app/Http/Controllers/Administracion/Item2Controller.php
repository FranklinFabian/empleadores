<?php

namespace App\Http\Controllers\Administracion;

use App\Http\Controllers\Controller;
use App\Models\Administracion\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use stdClass;

class Item2Controller extends Controller
{

    public function __construct() {
        $this->middleware(['role:administracion_clientes']);
    }

    public function index(Request $request)
    {
        $item = new Cliente();
        if ($request->ajax()){
            return Datatables($item->dataTables())->toJson();
        }
        $data = new stdClass();
        $data->page_title = 'Clientes';
        $data->page_description = 'Gestión de clientes';

        return view('pages.administracion.cliente.index')->with('data', $data);

    }

    public function tab(Request $request)
    {
        $data = new stdClass();
        $data->page_title = 'Clientes';
        $data->page_description = 'Gestión de clientes';
        $data->pid = $request->param1;
        $data->tipo = $request->param2;
        return view::make('pages.administracion.cliente.tab')->with('data', $data);
    }
}
