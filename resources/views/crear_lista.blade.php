
@extends('layouts.master')

@section('controlador', 'lista_controller')
@section('title', 'Registro de nueva linea')

@section('content')

  
  <form id="myForm" data-toggle="validator" role="form">
    
        <div>
        <select class = "form-control" ng-model="nueva_lista.empresa_id" ng-options="item.id as item.nombre for item in empresas track by item.id">
        <option value="">Seleccione una empresa</option>
        </select>
        </div>
        <br/>
        <div class="form-group">
        <input type="text"  ng-model="nueva_lista.nombre" class = "form-control" placeholder = "Ingrese nombre de la linea" required/>
        </div>
        <div class="form-group">
        <input type="text"  ng-model="nueva_lista.codigo" class = "form-control" placeholder = "Ingrese codigo de la linea" required/>
        </div>
        <a href = "#" class = "btn btn-default" role = "button" ng-click="registrar_lista()">Registrar</a>
        <a href = "app_listar_listas" class = "btn btn-default" role = "button" >Regresar</a>
    </form>
  

@stop

