
@extends('layouts.master')

@section('controlador', 'crear_user_controller')
@section('title', 'Registro de nuevo usuario')

@section('content')

  
  <script>
  $(document).ready(function(){
      //$('#myForm').validator();
  });
  </script>
  
  <form id="myForm" data-toggle="validator" role="form">
    
        <div class="form-group">
        <input type="text"  ng-model="nuevo_usuario.nombre" class = "form-control" placeholder = "Nombre"  required>
        </div>
        <div class="form-group">
        <input type="email"  ng-model="nuevo_usuario.email" class = "form-control" placeholder = "E-mail" data-error="El correo electronico es invalido" required/>
        <div class="help-block with-errors"></div>
        </div>
        <div class="form-group">
        <input type="text" pattern="[0-9]{1,}$" maxlength="9" minlength="9" ng-model="nuevo_usuario.telefono" class = "form-control" placeholder = "Telefono" data-error="El numero de telefono es invalido" required/>
        <div class="help-block with-errors"></div>
        </div>
        <div class="form-group">
        <input type="password"  ng-model="nuevo_usuario.password" class = "form-control" placeholder = "Password" required/>
        </div>
        <div class="form-group">
        <input type="text" pattern="[0-9]{1,}$" maxlength="8" minlength="8" ng-model="nuevo_usuario.dni" class = "form-control" placeholder = "DNI" data-error="El numero de DNI es invalido" required/><br/>
        <div class="help-block with-errors"></div>
        </div>
        
        
        <a href = "#" id="btnregistrar" class="btn btn-default" role="button" ng-click="registrar_usuario()">Registrar</a>
        <a href = "#" class="btn btn-default" role="button" >Regresar</a>
    </form>
  

@stop
