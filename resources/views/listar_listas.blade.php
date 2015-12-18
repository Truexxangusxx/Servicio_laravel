@extends('layouts.master')

@section('controlador', 'listar_lista_controller')
@section('title', 'Listar lineas')

@section('content')

  <form action="editar_lista" method="post">
  <table class = "table table-striped">
       <caption>Listado</caption>
       
       <thead>
          <tr>
             <th>id</th>
             <th>nombre</th>
             <th>empresa</th>
             <th>operaciones</th>
          </tr>
       </thead>
       
       <tbody>
         
         <tr ng-repeat="lista in listas">
            <td>[[lista.id]]</td>
            <td>[[lista.nombre]]</td>
            <td>[[lista.empresa.nombre]]</td>
            <td>
              <a href="#" class="btn btn-default" role="button" ng-click="editar_lista([[lista.id]])">Editar</a>
              <a href="#" class="btn btn-default" role="button" ng-click="eliminar_lista([[lista.id]])">Eliminar</a>
             </td>
        </tr>
         
       </tbody>
       
    </table>

<a href = "app_crear_lista" class = "btn btn-default" role = "button" >Nueva lista</a>
<a href = "#" class = "btn btn-default" role = "button" >Salir</a>
  
</form>

@stop
