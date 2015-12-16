@extends('layouts.master')

@section('controlador', 'ver_estado_controller')
@section('title', 'Consultar estado de ticket')

@section('content')



  
    <form role="form">
        <input type="text"  ng-model="atencion.codigo" class = "form-control" placeholder = "Ingrese codigo o numero de ticket"/><br/>
        <a href = "#" class="btn btn-default defecto" role="button" ng-click="generar_ticket()">Generar o consultar</a>
        
        <div>
        <h4>Numero: <span class = "label label-default">[[atencion.numero]]</span></h4>
        <h4>Linea: <span class = "label label-default">[[atencion.lista.empresa.nombre]]-[[atencion.lista.nombre]]</span></h4>
        <h4>Predecesores: <span class = "label label-default">[[atencion.predecesores]]</span></h4>
        <h4>Tiempo estimado: <span class = "label label-default">[[atencion.tiempo]]</span></h4>
        
        <br/>
        <a href = "app_solicitar_ticket" class = "btn btn-default" role = "button">Nuevo</a>
        <a href = "#" class = "btn btn-default" role = "button" >Actualizar</a>
        <a href = "#" class = "btn btn-default" role = "button" ng-click="cancelar_ticket()">Cancelar</a>
        </div>
        
    </form>
  

@stop

