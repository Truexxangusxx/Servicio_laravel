<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/



Route::get('/', function () {
    return view('welcome');
});

Route::get('prueba', function () {
    return 'esto es una prueba';
});


Route::controllers([
        'users' => 'UsersController'
    ]);

Route::controllers([
        'servicio' => 'ServicioController'
    ]);
    
    
Route::get('registrar_usuario/{nombre}/{email}/{password}/{dni}', 'UsersController@registrar');

Route::controllers([
        'empresas' => 'EmpresaController'
]);

Route::controllers([
        'listas' => 'ListaController'
]);
Route::post('listas','ListaController@postIndex');



Route::controllers([
        'asignacions' => 'AsignacionController'
]);

Route::controllers([
        'atencions' => 'AtencionController'
]);

Route::get('generar_ticket', 'AtencionController@generar_ticket');

Route::get('obtener_sesion', 'AtencionController@obtener_sesion');

Route::get('obtener_lista', 'AtencionController@obtener_lista');

Route::get('atender_atencion', 'AtencionController@atender_atencion');

Route::get('listas_por_user', 'AsignacionController@listas_por_user');

Route::get('ultimo_atendido', 'AtencionController@ultimo_atendido');

