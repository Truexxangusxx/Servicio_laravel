
@extends('layouts.master')

@section('controlador', 'crear_user_controller')
@section('title', 'Registro de nuevo usuario')

@section('content')

  
  <form role="form">
    
        <input type="text"  ng-model="nuevo_usuario.nombre" class = "form-control" placeholder = "Nombre" /><br/>
        <input type="text"  ng-model="nuevo_usuario.email" class = "form-control" placeholder = "E-mail"/><br/>
        <input type="password"  ng-model="nuevo_usuario.password" class = "form-control" placeholder = "Password"/><br/>
        <input type="text"  ng-model="nuevo_usuario.dni" class = "form-control" placeholder = "DNI"/><br/>
        
        <a href = "#" class = "btn btn-default" role = "button" ng-click="registrar_usuario()">Registrar</a>
        <a href = "#" class = "btn btn-default" role = "button" >Regresar</a>
    </form>
  

@stop
