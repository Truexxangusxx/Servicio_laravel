
@extends('layouts.master')

@section('controlador', 'crear_empresa_controller')
@section('title', 'Registro de nueva empresa')

@section('content')

  
<form id="myForm" data-toggle="validator" role="form">
    <div class="form-group">
    <input type="text"  ng-model="empresa.nombre" class = "form-control" placeholder = "Ingrese nombre de la empresa" required/>
    </div>
    <div class="form-group">
    <input type="text"  ng-model="empresa.codigo" class = "form-control" placeholder = "Ingrese codigo de la empresa" required/>
    </div>
    <a href = "#" class = "btn btn-default" role = "button" ng-click="registrar_empresa()">Registrar</a>
    <a href = "app_listar_empresas" class = "btn btn-default" role = "button" >Regresar</a>
</form>
  

@stop
