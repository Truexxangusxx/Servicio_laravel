
@extends('layouts.master')

@section('controlador', 'empresa_controller')
@section('title', 'Registro de nueva empresa')

@section('content')

  
<form role="form">
    
    <input type="text"  ng-model="empresa.nombre" class = "form-control" placeholder = "Ingrese nombre de la empresa"/><br/>
    <input type="text"  ng-model="empresa.codigo" class = "form-control" placeholder = "Ingrese codigo de la empresa"/><br/>
    <a href = "#" class = "btn btn-default" role = "button" ng-click="registrar_empresa()">Registrar</a>
    <a href = "app_listar_empresas" class = "btn btn-default" role = "button" >Regresar</a>
</form>
  

@stop
