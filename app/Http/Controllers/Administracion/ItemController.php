<?php

namespace App\Http\Controllers\Administracion;

use App\Http\Controllers\Controller;
use App\Models\Administracion\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use stdClass;

class ItemController extends Controller
{

    public function __construct() {
        $this->middleware(['role:administracion_usuarios']);
    }

    public function index(Request $request)
    {
        $item = new User();
        if ($request->ajax()){
            return Datatables($item->dataTables())->toJson();
        }
        $data = new stdClass();
        $data->page_title = 'Usuarios';
        $data->page_description = 'Gestión de usuarios';
        return view('pages.administracion.item.index')->with('data', $data);

    }

    public function tab(Request $request)
    {
        $data = new stdClass();
        $data->page_title = 'Usuarios';
        $data->page_description = 'Gestión de usuarios';
        $data->pid = $request->param1;
        $data->tipo = $request->param2;
        return view::make('pages.administracion.item.tab')->with('data', $data);
    }
}
