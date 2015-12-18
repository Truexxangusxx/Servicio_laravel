
@extends('layouts.master')

@section('controlador', 'crear_empresa_controller')


@if(isset($empresa))
    @section('title', 'Edicion de empresa')
@else
    @section('title', 'Registro de nueva empresa')
@endif

@section('content')



@if(isset($empresa))
   <input id="empresa" type="hidden"  ng-model="empresa.id" class="form-control" ng-value="{!! $empresa->id !!}"/>
@endif
  
<form id="myForm" data-toggle="validator" role="form">
    <div class="form-group">
    <input type="text"  ng-model="empresa.nombre" class = "form-control" placeholder = "Ingrese nombre de la empresa" required/>
    </div>
    <div class="form-group">
    <input type="text"  ng-model="empresa.codigo" class = "form-control" placeholder = "Ingrese codigo de la empresa" required/>
    </div>
    
    @if(isset($empresa))
        <a href="#" class="btn btn-default defecto" role="button" ng-click="registrar_empresa()">Editar</a>
    @else
        <a href="#" class="btn btn-default defecto" role="button" ng-click="registrar_empresa()">Registrar</a>
    @endif
    
    
    <a href = "app_listar_empresas" class = "btn btn-default" role = "button" >Regresar</a>
</form>
  

@stop
