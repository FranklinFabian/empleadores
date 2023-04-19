<?php

namespace App\Http\Controllers\Ente\Formulario;

use App\Http\Controllers\Controller;
use App\Models\Ente\Formulario\Item;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use stdClass;
use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;

class ItemController extends Controller
{

    public function __construct() {
        $this->middleware(['role:ente_formulario_item']);
    }

    public function index(Request $request)
    {
        $id = auth()->user()->id;
        $item = new Item();
        if ($request->ajax()){
            return Datatables($item->dataTables($id))->toJson();
        }

        $data = new stdClass();
        $data->page_title = 'Ente - Formulario';
        $data->page_description = 'Ente - Formulario';
        return view('pages.ente.formulario.index')->with('data', $data);

    }

    public function tab(Request $request)
    {
        $data = new stdClass();
        $data->page_title = 'Ente - Formulario';
        $data->page_description = 'Ente - Formulario';
        $data->pid = $request->param1;
        $data->tipo = $request->param2;
        return view('pages.ente.formulario.tab')->with('data', $data);
    }


    public function fichaPdf($id){

        $item = new Item();

        $data['data'] = $item->obtenerData($id);
        $data['movimientos'] = $item->obtenerMovimiento($data['data']->id);
        //dd((!empty($arry)));
        $pdf = PDF::loadView('pages.ente.formulario.pdf', $data);

        return $pdf->download('reporte_lista.pdf');
    }

    public function csv(){
        return Excel::download(new UsersExport, 'emp.csv',\Maatwebsite\Excel\Excel::CSV);
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
