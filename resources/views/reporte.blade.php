@extends('layouts.master')

@section('controlador', 'reporte_controller')
@section('title', 'Reporte de promedios de colaboradores')

@section('content')

  
    <table class = "table table-striped">
       <caption>Listado</caption>
       
       <thead>
          <tr>
             <th>Colaborador</th>
             <th>Clientes</th>
             <th>Asignacion</th>
             <th>Atencion</th>
          </tr>
       </thead>
       
       <tbody>
         
         <tr ng-repeat="elemento in elementos">
            <td>[[elemento.name]]</td>
            <td>[[elemento.cantidad]]</td>
            <td>[[elemento.asignado]]</td>
            <td>[[elemento.atendido]]</td>
        </tr>
         
       </tbody>
       
  </table>
  
  
  
<div class="demo-container">
			<div id="placeholder" class="demo-placeholder"></div>
	</div>    


@stop


