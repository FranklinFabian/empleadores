<?php

namespace App\Http\Controllers;
use stdClass;

class InicioController extends Controller
{
    public function __construct() {
        $this->middleware(['auth']);
    }

    public function index()
    {
        $data = new stdClass();
        $data->page_title = 'Inicio';
        $data->page_description = 'Página de inicio';
        return view('pages.index')->with('data', $data);
    }

}
