 <?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
})->middleware('guest');

/*Rutas de autenticación*/
Route::namespace('Autenticacion')->name('autenticacion.')->group(function(){
    //Formulario de autenticación

    Route::get('/', 'LoginController@loginForm')->name('loginForm');
    //Función para inicio de sesión
    Route::post('/login', 'LoginController@login')->name('login');
    //Función para cerrar sesión
    Route::post('/logout', 'LoginController@logout')->name('logout');
    // Registro
    Route::post('/registro', 'RegistroController@store')->name('store');
});

Route::group(['middleware' => ['auth']], function() {

    Route::get('/dashboard', 'InicioController@index')->name('dashboard');

    /*Rutas de usuario administrador*/
    Route::namespace('Administracion')->prefix('administracion')->name('administracion.')->middleware('role:administrador')->group(function(){

        // Item
        Route::get('/item', 'ItemController@index')->name('item');
        Route::get('/item/tab/{param1}/{param2}', 'ItemController@tab')->name('tab');

        // Item2
        Route::get('/item2', 'Item2Controller@index')->name('item2');
        Route::get('/item2/tab/{param1}/{param2}', 'Item2Controller@tab')->name('tab2');

        // General
        Route::resource('/item/general', 'GeneralController', ['except' => ['show', 'create']]);
        Route::get('/item/general/{param1}/{param2}', 'GeneralController@index')->name('general');

        // General2
        Route::resource('/item2/general2', 'General2Controller', ['except' => ['show', 'create']]);
        Route::get('/item2/general2/{param1}/{param2}', 'General2Controller@index')->name('general2');

        // Submódulo Módulo
        Route::resource('/item/modulo', 'ModuloController', ['except' => ['show', 'create']]);
        Route::get('/item/modulo/{param1}/{param2}', 'ModuloController@index')->name('modulo');
        Route::get('/item/modulo_datatable/{param1}', 'ModuloController@dataTable')->name('modulodatatable');
        Route::get('/item/modulo/{param1}/{param2}/{param3}/edit', 'ModuloController@edit');

        // Submódulo Submódulo
        Route::resource('/item/submodulo', 'SubmoduloController', ['except' => ['show', 'create']]);
        Route::get('/item/submodulo/{param1}/{param2}', 'SubmoduloController@index')->name('submodulo');
        Route::get('/item/submodulo_datatable/{param1}', 'SubmoduloController@dataTable')->name('submodulodatatable');
        Route::get('/item/submodulo/{param1}/{param2}/{param3}/edit', 'SubmoduloController@edit');
        Route::get('/item/submodulo_catalogo/submodulo/{param1}/{param2}', 'SubmoduloController@submodulo');

        // Submódulo Asignacion
        Route::resource('/item/asignacion', 'AsignacionController', ['except' => ['show', 'create']]);
        Route::get('/item/asignacion/{param1}/{param2}', 'AsignacionController@index')->name('asignacion');
        Route::get('/item/asignacion_datatable/{param1}', 'AsignacionController@dataTable')->name('asignaciondatatable');
        Route::get('/item/asignacion/{param1}/{param2}/{param3}/edit', 'AsignacionController@edit');

    });



    Route::namespace('Reporte\Lista')->prefix('reporte/lista')->name('reporte_lista.')->middleware('role:reporte')->group(function(){
        // Item
        Route::get('item', 'ItemController@index')->name('reporte_lista_index');

        // Reporte PDF
        Route::get('item/ficha_pdf/{param1}', 'ItemController@fichaPdf')->name('reporte_lista_ficha_pdf');
    });

    Route::namespace('Reporte\Resumen')->prefix('reporte/resumen')->name('reporte_resumen.')->middleware('role:reporte')->group(function(){
        // Item
        Route::get('item', 'ItemController@index')->name('reporte_lista_index');

        // Reporte PDF
        Route::get('item/ficha_pdf', 'ItemController@fichaPdf')->name('empleabilidad_curriculo_ficha_pdf');

        // General
        Route::resource('general', 'GeneralController', ['except' => ['show', 'create']]);
        Route::get('general', 'GeneralController@index')->name('reporte_resumen_general');

        // Totales
        Route::resource('total', 'TotalController', ['except' => ['show', 'create']]);
        Route::get('total', 'TotalController@index')->name('reporte_resumen_total');

        // Departamentos
        Route::resource('departamento', 'DepartamentoController', ['except' => ['show', 'create']]);
        Route::get('departamento', 'DepartamentoController@index')->name('reporte_resumen_departamento');

        // Entes
        Route::resource('ente', 'EnteController', ['except' => ['show', 'create']]);
        Route::get('ente', 'EnteController@index')->name('reporte_resumen_ente');

        // Rutas Apis
        Route::get('/general/grafico_dinamico/', 'GeneralController@grafico_dinamico');

    });

    Route::namespace('Ente\Formulario')->prefix('ente/formulario')->name('ente_formulario.')->middleware('role:ente')->group(function(){
        // Item
        Route::get('item', 'ItemController@index')->name('ente_formulario_index');
        Route::delete('item/{param1}', 'ItemController@destroy');

        // Reporte PDF
        Route::get('item/ficha_pdf/{param1}', 'ItemController@fichaPdf')->name('ente_formulario_ficha_pdf');

        // Reporte CSV
        Route::get('item/csv/', 'ItemController@csv')->name('ente_formulario_csv');

        // Tab
        Route::get('tab/{param1}/{param2}', 'ItemController@tab')->name('ente_formulario_tab');

        // General
        Route::resource('general', 'GeneralController', ['except' => ['show', 'create']]);
        Route::get('general/{param1}/{param2}', 'GeneralController@index')->name('ente_formulario_general');

        // Movimiento
        Route::resource('movimiento', 'MovimientoController', ['except' => ['show', 'create']]);
        Route::get('movimiento/{param1}/{param2}', 'MovimientoController@index')->name('ente_formulario_movimiento');
        Route::get('movimiento_datatable/{param1}', 'MovimientoController@dataTable')->name('ente_formulario_movimiento_datatable');
        Route::get('movimiento/{param1}/{param2}/{param3}/edit', 'MovimientoController@edit');

    });






});

