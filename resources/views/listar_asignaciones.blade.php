@extends('layouts.master')

@section('controlador', 'asignacion_controller')
@section('title', 'Listar asignaciones')

@section('content')

<form method="post" action="editar_asignacion"> 
  <table class = "table table-striped">
       <caption>Listado</caption>
       
       <thead>
          <tr>
             <th>id</th>
             <th>colaborador</th>
             <th>ventanilla</th>
             <th>linea</th>
             <th>empresa</th>
             <th>operaciones</th>
          </tr>
       </thead>
       
       <tbody>
         
         <tr ng-repeat="asignacion in asignacions">
            <td>[[asignacion.id]]</td>
            <td>[[asignacion.user.name]]</td>
            <td>[[asignacion.ventanilla]]</td>
            <td>[[asignacion.lista.nombre]]</td>
            <td>[[asignacion.lista.empresa.nombre]]</td>
            <td>
              <a href = "#" class = "btn btn-default" role = "button" ng-click="eliminar_asignacion([[asignacion.id]])">eliminar</a>
              <a href = "#" class = "btn btn-default" role = "button" ng-click="editar_asignacion([[asignacion.id]])">editar</a>
            </td>
        </tr>
         
       </tbody>
       
    </table>

<a href = "app_asignar_colaborador" class = "btn btn-default" role = "button" >Nueva asignacion</a>
<a href = "#" class = "btn btn-default" role = "button" >Salir</a>
</form>  

@stop
