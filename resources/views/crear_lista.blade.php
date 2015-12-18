
@extends('layouts.master')

@section('controlador', 'lista_controller')

@if(isset($lista))
    @section('title', 'Edicion de linea')
@else
    @section('title', 'Registro de nueva linea')
@endif

@section('content')


@if(isset($lista))
   <input id="lista" type="hidden"  ng-model="lista.id" class="form-control" ng-value="{!! $lista->id !!}"/>
@endif

  <form id="myForm" data-toggle="validator" role="form">
    
        <div>
        <select class = "form-control" ng-model="nueva_lista.empresa_id" ng-options="item.id as item.nombre for item in empresas">
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
        
        @if(isset($lista))
            <a href="#" class="btn btn-default defecto" role="button" ng-click="registrar_lista()">Editar</a>
        @else
            <a href="#" class="btn btn-default defecto" role="button" ng-click="registrar_lista()">Registrar</a>
        @endif
        
        <a href = "app_listar_listas" class = "btn btn-default" role = "button" >Regresar</a>
  </form>
  

@stop

