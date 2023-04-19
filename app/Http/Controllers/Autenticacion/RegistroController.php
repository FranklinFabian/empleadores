<?php

namespace App\Http\Controllers\Autenticacion;

use App\Http\Controllers\Controller;
use App\Models\Administracion\User;
use Illuminate\Http\Request;
use stdClass;

class RegistroController extends Controller
{

    public function store(Request $request)
    {
        $res = new stdClass();
        $data = $request->item;
        //$data['model_type'] = 'App\Models\Administracion\User';
        $data['password'] = bcrypt($request->item['password']);
        $data['id_estado'] = 1;
        $data['id_tipo_usuario'] = 1;


        try {
            User::updateOrCreate(['id' => $request->id], $data);
            $res->id = 1;
        } catch (\Exception $e) {
            $res->id = 0;
        }
        $res->type = $request->type;

        return response()->json($res);

    }



}
