<?php

use Illuminate\Support\Facades\Session as Session;
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


Route::get('app_reporte', function () {
    return view('reporte');
});

Route::match(['get', 'post'],'app_asignar_colaborador', function () {
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
    if (Session::has('user')){
        if (Session::get('user')->colaborador==1){
            return view('atender_lista');
        }
        else{
            if (Session::get('user')->admin==1){
                return view('listar_asignaciones');
            }
            else{
                return view('solicitar_ticket');
            }
        }
        
    }
    else{
        return view('iniciar_sesion');
    }
    
});

Route::get('app_ver_estado', function () {
    return view('ver_estado');
});

Route::get('nav', function () {
    return view('nav');
});

Route::get('footer', function () {
    return view('footer');
});

Route::get('demo', function () {
    return view('demo');
});


Route::get('/', function () {
    if (Session::has('user')){
        if (Session::get('user')->colaborador==1){
            return view('atender_lista');
        }
        else{
            if (Session::get('user')->admin==1){
                return view('listar_asignaciones');
            }
            else{
                return view('solicitar_ticket');
            }
        }
    }
    else{
        return view('iniciar_sesion');
    }
});

Route::get('totem', function () {
    if (Session::has('user')){
        if (Session::get('user')->generico==1){
            return view('disparar_ticket');
        }
        else{
            return view('solicitar_ticket');//reportar
        }
    }
    else{
        return view('iniciar_sesion');//reportar
    }
    
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

Route::get('obtener_sesion_atencion', 'AtencionController@obtener_sesion_atencion');

Route::get('obtener_lista_asignada', 'AtencionController@obtener_lista_asignada');

Route::get('atender_atencion', 'AtencionController@atender_atencion');

Route::get('listas_por_user', 'AsignacionController@listas_por_user');

Route::get('ultimo_atendido', 'AtencionController@ultimo_atendido');

Route::get('iniciar_sesion', 'UsersController@iniciar_sesion');

Route::get('cerrar_sesion', 'UsersController@cerrar_sesion');

Route::get('usuario_logeado', 'UsersController@usuario_logeado');

Route::get('ventanillas_xml', 'UsersController@ventanillas_xml');

Route::get('accesos', 'UsersController@accesos');

Route::get('buscar_user', 'UsersController@buscar_user');

Route::get('actualizar_user', 'UsersController@actualizar_user');

Route::get('eliminar_asignacion', 'AsignacionController@eliminar_asignacion');

Route::get('asignar_atencion', 'AtencionController@asignar_atencion');

Route::get('reporte_1', 'AtencionController@reporte_1');

/*
Route::get('registrar_usuario/{email}/confirmar/{codigo}', function ($email,$codigo) {
    return 'el email es :'.$email." y el codigo de activacion es:".$codigo;
});
*/
Route::get('confirmar', 'UsersController@confirmacion');

Route::get('cancelar_ticket', 'AtencionController@cancelar_ticket');

Route::match(['get', 'post'],'editar_asignacion', 'AsignacionController@editar_asignacion');

Route::match(['get', 'post'],'obtener_asignacion', 'AsignacionController@obtener_asignacion');

Route::match(['get', 'post'],'eliminar_empresa', 'EmpresaController@eliminar_empresa');

Route::match(['get', 'post'],'editar_empresa', 'EmpresaController@editar_empresa');

Route::match(['get', 'post'],'obtener_empresa', 'EmpresaController@obtener_empresa');

Route::match(['get', 'post'],'eliminar_lista', 'ListaController@eliminar_lista');

Route::match(['get', 'post'],'editar_lista', 'ListaController@editar_lista');

Route::match(['get', 'post'],'obtener_lista', 'ListaController@obtener_lista');