@extends('layouts.master')

@section('controlador', 'accesos_controller')
@section('title', 'Brindar accesos a colaborador')

@section('content')

  
    <form role="form">
        <input type="text"  ng-model="user_busqueda.email" class = "form-control" placeholder = "Ingrese correo del usuario"/><br/>
        <a href = "#" class = "btn btn-default" role = "button" ng-click="buscar_user()">Buscar</a>
        
        <div>
        <input type="hidden"  ng-model="user.id" class = "form-control" />
        <h4>Nombre: <span class = "label label-default">[[user.name]]</span></h4>
        <h4>Correo: <span class = "label label-default">[[user.email]]</span></h4>
        <div class = "checkbox">
          <label><input type="checkbox" ng-model="user.colaborador" ng-true-value="'1'" ng-false-value="'0'"> Colaborador</label>
        </div>
        <div class = "checkbox">
          <label><input type="checkbox" ng-model="user.admin" ng-true-value="'1'" ng-false-value="'0'"> Administrador</label>
        </div>
        
        <br/>
        <a href="#" class="btn btn-default" role = "button" ng-click="actualizar_user()">Actualizar</a>
        <a href="#" class="btn btn-default" role = "button" >Cancelar</a>
        </div>
        
    </form>
  

@stop

