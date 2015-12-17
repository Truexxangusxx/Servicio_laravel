
@extends('layouts.master')

@section('controlador', 'asignar_colaborador')

@if(isset($asignacion))
    @section('title', 'Edicion de asignacion')
@else
    @section('title', 'Registro de nueva asignacion')
@endif
@section('content')


@if(isset($asignacion))
   {!! $asignacion->lista->empresa_id !!}
   <input id="asignacion" type="hidden"  ng-model="asignacion" class="form-control" ng-value="{!! $asignacion->id !!}"/>
@endif


    <form id="myForm" data-toggle="validator" role="form">
        <select id="empresa" class = "form-control" ng-model="nueva_asignacion.lista.empresa_id" ng-options="item.id as item.nombre for item in empresas track by item.id" ng-change="listar_listas()" >
            <option value="">Seleccione una empresa</option>
        </select><br/>
        <select class = "form-control" ng-model="nueva_asignacion.lista_id" ng-options="item.id as item.nombre for item in listas track by item.id">
            <option value="">Seleccione una linea</option>
        </select><br/>
        <select class = "form-control" ng-model="nueva_asignacion.user_id" ng-options="item.id as item.name for item in usuarios track by item.id">
            <option value="">Seleccione un colaborador</option>
        </select><br/>
        <div class="form-group">
        <input type="text"  ng-model="nueva_asignacion.ventanilla" class = "form-control" placeholder = "Ingrese nombre de ventanilla" required/>
        </div>
        <a href = "#" class = "btn btn-default" role = "button" ng-click="registrar_asignacion()">Registrar</a>
        <a href = "app_listar_asignaciones" class = "btn btn-default" role = "button" >Regresar</a>
    </form>





@stop
