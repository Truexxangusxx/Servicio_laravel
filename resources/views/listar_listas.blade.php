@extends('layouts.master')

@section('controlador', 'listar_lista_controller')
@section('title', 'Listar lineas')

@section('content')

  
  <table class = "table table-striped">
       <caption>Listado</caption>
       
       <thead>
          <tr>
             <th>id</th>
             <th>nombre</th>
             <th>empresa</th>
          </tr>
       </thead>
       
       <tbody>
         
         <tr ng-repeat="lista in listas">
            <td>[[lista.id]]</td>
            <td>[[lista.nombre]]</td>
            <td>[[lista.empresa.nombre]]</td>
        </tr>
         
       </tbody>
       
    </table>

<a href = "app_crear_lista" class = "btn btn-default" role = "button" >Nueva lista</a>
<a href = "#" class = "btn btn-default" role = "button" >Salir</a>
  

@stop
