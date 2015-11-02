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


Route::get('app_asignar_colaborador', function () {
    return view('asignar_colaborador');
});

Route::get('app_atender_lista', function () {
    return view('atender_lista');
});

Route::get('app_crear_empresa', function () {
    return view('crear_empresa');
});

Route::get('app_crear_lista', function () {
    return view('crear_lista');
});

Route::get('app_crear_user', function () {
    return view('crear_user');
});

Route::get('app_iniciar_sesion', function () {
    return view('iniciar_sesion');
});

Route::get('app_listar_asignaciones', function () {
    return view('listar_asignaciones');
});

Route::get('app_listar_empresas', function () {
    return view('listar_empresas');
});

Route::get('app_listar_listas', function () {
    return view('listar_listas');
});

Route::get('app_solicitar_ticket', function () {
    return view('solicitar_ticket');
});

Route::get('app_ver_estado', function () {
    return view('ver_estado');
});

Route::get('nav', function () {
    return view('nav');
});

Route::get('demo', function () {
    return view('demo');
});


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

Route::get('iniciar_sesion', 'UsersController@iniciar_sesion');

Route::get('usuario_logeado', 'UsersController@usuario_logeado');

