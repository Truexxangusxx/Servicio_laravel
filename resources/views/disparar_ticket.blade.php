@extends('layouts.master')

@section('controlador', 'solicitar_ticket_controller')
@section('title', 'Solicitar nuevo ticket')

@section('content')


  <form id="myForm" role="form" data-toggle="validator">
        <div class="form-group">
        <select class = "form-control" ng-model="empresa" required ng-options="item.id as item.nombre for item in empresas" ng-change="listar_listas()">
        </select>
        </div>
        <div class="form-group">
        <select class = "form-control" ng-model="nueva_atencion.lista_id" ng-options="item.id as item.nombre for item in listas track by item.id" required>
            <option value="">Seleccione una lista</option>
        </select>
        </div>
        <div class="form-group">
            <input type="text" ng-model="nueva_atencion.nombre" class="form-control" placeholder="Ingrese su nombre" required>
        </div>
        <div class="form-group">
        <input type="tel" ng-model="nueva_atencion.dni" class = "form-control" placeholder = "Ingrese su DNI" required>
        </div>
        <div>
        <input type="tel" ng-model="nueva_atencion.telefono" class = "form-control" placeholder = "Ingrese su numero celular"/>
        </div>
        </br>
        <a href = "#" class = "btn btn-default" role = "button" ng-click="registrar_atencion()">Imprimir</a>
        <a href = "#" class = "btn btn-default" role = "button" ng-click="registrar_atencion_sms()">Enviar SMS</a>
    </form>
  

@stop


<div id="impresion" style="display:none;">
<h1></h1>
</div>