@extends('layouts.master')

@section('controlador', 'asignacion_controller')
@section('title', 'Listar asignaciones')

@section('content')

  
  <table class = "table table-striped">
       <caption>Listado</caption>
       
       <thead>
          <tr>
             <th>id</th>
             <th>colaborador</th>
             <th>linea</th>
             <th>empresa</th>
             <th>ventanilla</th>
             <th>eliminar</th>
          </tr>
       </thead>
       
       <tbody>
         
         <tr ng-repeat="asignacion in asignacions">
            <td>[[asignacion.id]]</td>
            <td>[[asignacion.user.name]]</td>
            <td>[[asignacion.lista.nombre]]</td>
            <td>[[asignacion.lista.empresa.nombre]]</td>
            <td>[[asignacion.ventanilla]]</td>
            <td><a href = "#" class = "btn btn-default" role = "button" ng-click="eliminar_asignacion([[asignacion.id]])">eliminar</a></td>
        </tr>
         
       </tbody>
       
    </table>

<a href = "app_asignar_colaborador" class = "btn btn-default" role = "button" >Nueva asignacion</a>
<a href = "#" class = "btn btn-default" role = "button" >Salir</a>
  

@stop
