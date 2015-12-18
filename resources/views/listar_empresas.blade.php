@extends('layouts.master')

@section('controlador', 'empresa_controller')
@section('title', 'Listar empresas')

@section('content')

  <form method="post" action="editar_empresa">
  <table class = "table table-striped">
       <caption>Listado</caption>
       
       <thead>
          <tr>
             <th>id</th>
             <th>nombre</th>
             <th>codigo</th>
             <th>operaciones</th>
          </tr>
       </thead>
       
       <tbody>
         
         <tr ng-repeat="empresa in empresas">
            <td>[[empresa.id]]</td>
            <td>[[empresa.nombre]]</td>
            <td>[[empresa.codigo]]</td>
            <td>
              <a href="#" class="btn btn-default" role="button" ng-click="editar_empresa([[empresa.id]])"><i class=" fa fa-pencil"></i></a>
              <a href="#" class="btn btn-default" role="button" ng-click="eliminar_empresa([[empresa.id]])"><i class=" fa fa-trash"></i></a>
            </td>
        </tr>
         
       </tbody>
       
  </table>

<a href = "app_crear_empresa" class = "btn btn-default" role = "button" >Nueva empresa</a>
<a href = "#" class = "btn btn-default" role = "button" >Salir</a>
</form>  

@stop

