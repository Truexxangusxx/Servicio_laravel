@extends('layouts.master')

@section('controlador', 'atencion_controller')
@section('title', 'Atencion de lineas')

@section('content')




<form role="form">
    
    
    <select class = "form-control" ng-model="user.lista_id" required ng-options="item.id as item.nombre for item in listas" ng-change="mostrar_cola()">
        
    </select><br/>
    <div align="center" class="cont-img" style="padding:20px 0px 20px 0px;">
    
        <img style="margin: 5px;" class="img-responsive" src="{{ asset('assets/images/user1.png') }}" width="50" height="50">[[ultimo_atendido.numero]]
        <div ng-if="atencions.length>0">
            <span ng-repeat-start="atencion in atencions" ng-if="$first" big>
                <div style="border: 1.5px solid black;">[[atencion.user.name === 'generico' ? atencion.nombre+'-'+atencion.dni : atencion.user.name+'-'+atencion.user.dni]]<a href="#" ng-click="asignar_atencion()"><img data-placement = "right" data-toggle = "tooltip" style="margin: 5px;" class="img-responsive" src="{{ asset('assets/images/user[[atencion.colaborador_id === null ? 0 : 1]].png') }}" width="100" height="100"></a>[[atencion.numero]]</div>
                <br/>
                <a href = "#" class = "btn btn-default" role = "button" ng-click="atender_atencion(2)">Atendido</a>
                <a href = "#" class = "btn btn-default" role = "button" ng-click="atender_atencion(3)">Ausente</a>
            </span>
            <span ng-repeat-end ng-if="!$first">
                <img title = "[[atencion.user.name === 'generico' ? atencion.nombre+'-'+atencion.dni : atencion.user.name+'-'+atencion.user.dni]]" style="margin: 5px;" class="img-responsive" src="{{ asset('assets/images/user[[atencion.colaborador_id === null ? 0 : 1]].png') }}" width="50" height="50">[[atencion.numero]]
            </span>
        </div>
    </div>
   
        <br/>
        
        
 </form>
  

@stop

