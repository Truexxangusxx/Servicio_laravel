@extends('layouts.master')

@section('controlador', 'solicitar_ticket_controller')
@section('title', 'Solicitar nuevo ticket')

@section('content')

  
  <form role="form">
        <select class = "form-control" ng-model="empresa" ng-options="item.id as item.nombre for item in empresas track by item.id" ng-change="listar_listas()">
            <option value="">Seleccione una empresa</option>
        </select><br/>
        <select class = "form-control" ng-model="nueva_atencion.lista_id" ng-options="item.id as item.nombre for item in listas track by item.id">
            <option value="">Seleccione una lista</option>
        </select><br/>
        <select class = "form-control" ng-model="nueva_atencion.modo" >
            <option value="">Seleccione un modo de recepcion</option>
            <option value="correo">correo</option>
            <option value="sms">sms</option>
            <option value="imprimir">imprimir</option>
        </select><br/>
        <a href = "#" class = "btn btn-default" role = "button" ng-click="registrar_atencion()">Solicitar</a>
        <a href = "#" class = "btn btn-default" role = "button" >Regresar</a>
    </form>
  

@stop


<div id="impresion" style="display:none;">
<h1></h1>
</div>