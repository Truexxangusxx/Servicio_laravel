
@extends('layouts.master')

@section('controlador', 'first_controller')
@section('title', 'Iniciar sesion')

@section('content')

  
  <form role="form">
    
    <input type="text" ng-model="user.email" class = "form-control" placeholder = "Correo"/><br/>
    <input type="password"  ng-model="user.password" class = "form-control" placeholder = "Password"/><br/>
      
    <a href = "#" class = "btn btn-default" role = "button" ng-click="iniciar_sesion()">Ingresar</a>
    <a href = "#" class = "btn btn-default" role = "button" >Cancelar</a>
  </form>
  

@stop
