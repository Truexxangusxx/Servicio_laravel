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

Route::controllers([
        'asignacions' => 'AsignacionController'
]);

Route::controllers([
        'atencions' => 'AtencionController'
]);