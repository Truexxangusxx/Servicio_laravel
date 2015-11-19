@extends('layouts.master')

@section('controlador', 'atencion_controller')
@section('title', 'Atencion de lineas')

@section('content')

  
<form role="form">
    
        
    <select class = "form-control" ng-model="user.user_id" ng-options="item.id as item.name for item in usuarios track by item.id"  ng-change="listar_listas()">
        <option value="">Temporalmente seleccione un usuario</option>
    </select><br/>
    <select class = "form-control" ng-model="user.lista_id" ng-options="item.id as item.nombre for item in listas track by item.id" ng-change="mostrar_cola()">
        <option value="">Seleccione una lista</option>
    </select><br/>
    <div align="center" class="cont-img" style="padding:20px 0px 20px 0px;">
    
        <img style="margin: 5px;" class="img-responsive" src="https://pixabay.com/static/uploads/photo/2015/10/05/22/37/blank-profile-picture-973461__180.png" width="50" height="50">@{{ultimo_atendido.numero}}
        <span ng-repeat-start="atencion in atencions" ng-if="$first" big>
            <div style="border: 1.5px solid black;">@{{atencion.user.name}}<img data-placement = "right" data-toggle = "tooltip" title = "<h3>Jose Arturo Arias Davila</h3><h2>BVC32</h2>" style="margin: 5px;" class="img-responsive" src="https://pixabay.com/static/uploads/photo/2015/10/05/22/37/blank-profile-picture-973461__180.png" width="100" height="100">@{{atencion.numero}}</div>
        </span>
        <span ng-repeat-end ng-if="!$first">
            <img style="margin: 5px;" class="img-responsive" src="https://pixabay.com/static/uploads/photo/2015/10/05/22/37/blank-profile-picture-973461__180.png" width="50" height="50">@{{atencion.numero}}
        </span>
        
    </div>
   
        <br/>
        <a href = "#" class = "btn btn-default" role = "button" ng-click="atender_atencion(2)">Atendido</a>
        <a href = "#" class = "btn btn-default" role = "button" ng-click="atender_atencion(3)">Ausente</a>
 </form>
  

@stop

