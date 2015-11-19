@extends('layouts.master')

@section('controlador', 'empresa_controller')
@section('title', 'Listar empresas')

@section('content')

  
  <table class = "table table-striped">
       <caption>Listado</caption>
       
       <thead>
          <tr>
             <th>id</th>
             <th>nombre</th>
             <th>codigo</th>
          </tr>
       </thead>
       
       <tbody>
         
         <tr ng-repeat="empresa in empresas">
            <td>@{{empresa.id}}</td>
            <td>@{{empresa.nombre}}</td>
            <td>@{{empresa.codigo}}</td>
        </tr>
         
       </tbody>
       
  </table>

<a href = "app_crear_empresa" class = "btn btn-default" role = "button" >Nueva empresa</a>
<a href = "#" class = "btn btn-default" role = "button" >Salir</a>
  

@stop

