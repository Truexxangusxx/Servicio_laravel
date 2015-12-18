
@extends('layouts.master')

@section('controlador', 'asignar_colaborador')

@if(isset($asignacion))
    @section('title', 'Edicion de asignacion')
@else
    @section('title', 'Registro de nueva asignacion')
@endif
@section('content')


@if(isset($asignacion))
   <input id="asignacion" type="hidden"  ng-model="nueva_asignacion.id" class="form-control" ng-value="{!! $asignacion->id !!}"/>
@endif


    <form id="myForm" data-toggle="validator" role="form">
        <select class = "form-control" ng-model="empresa" required ng-options="item.id as item.nombre for item in empresas" ng-change="listar_listas()" >
            <option value="">Seleccione una empresa</option>
        </select><br/>
        <select class = "form-control" ng-model="nueva_asignacion.lista_id" ng-options="item.id as item.nombre for item in listas">
            <option value="">Seleccione una linea</option>
        </select><br/>
        <select class = "form-control" ng-model="nueva_asignacion.user_id" ng-options="item.id as item.name for item in usuarios">
            <option value="">Seleccione un colaborador</option>
        </select><br/>
        <div class="form-group">
        <input type="text"  ng-model="nueva_asignacion.ventanilla" class = "form-control" placeholder = "Ingrese nombre de ventanilla" required/>
        </div>
        
        @if(isset($asignacion))
        <a href="#" class="btn btn-default defecto" role = "button" ng-click="registrar_asignacion()">Editar</a>
        @else
        <a href="#" class="btn btn-default defecto" role = "button" ng-click="registrar_asignacion()">Registrar</a>
        @endif
        <a href = "app_listar_asignaciones" class = "btn btn-default" role = "button" >Regresar</a>
    </form>





@stop
