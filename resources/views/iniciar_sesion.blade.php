
@extends('layouts.master')

@section('title', 'Page Title')



@section('content')
  <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3"> 
    <form role="form">
    
      <input type="text" ng-model="user.email" class = "form-control" placeholder = "Correo"/><br/>
      <input type="password"  ng-model="user.password" class = "form-control" placeholder = "Password"/><br/>
      
      <a href = "#" class = "btn btn-default" role = "button" ng-click="iniciar_sesion()">Ingresar</a>
      <a href = "#" class = "btn btn-default" role = "button" >Cancelar</a>
    </form>
  </div>
@stop

