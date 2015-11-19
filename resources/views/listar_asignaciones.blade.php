<!DOCTYPE html>
<html ng-app="colas">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistema de colas</title>

    <link href="{{ URL::asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ URL::asset('assets/css/personalizado.css') }}" rel="stylesheet" type="text/css">
 	<script src="{{ URL::asset('assets/js/jquery-1.11.3.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/angular.min.js') }}"></script>
	
<script>

angular.module("colas",[])
	.controller("asignacion_controller", function($scope, $http,$window){
		$scope.asignacions = {};
		
		
		$scope.sesion={};
		$http({
		        url: "/usuario_logeado",
		        method: "GET"
		    })
        		.success(function(data){
                    $scope.sesion=data;
        		})
        		.error(function(err){
        			console.log(err);
        	});
		
		
		$http({
		        url: "/asignacions",
		        method: "GET"
		    })
        		.success(function(data){
                    $scope.asignacions=data;
        		})
        		.error(function(err){
        			console.log(err);
        		});
        		
		
		
	});

</script>

</head>

<body ng-controller="asignacion_controller">
<div ng-include="'nav'"></div>
<div class = "container">

<div class = "panel panel-primary">
   <div class = "panel-heading">
      <h3 class = "panel-title">Listar asignaciones</h3>
   </div>
   <div class = "panel-body">
   
   


	
	
<div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">	
   <table class = "table table-striped">
       <caption>Listado</caption>
       
       <thead>
          <tr>
             <th>id</th>
             <th>colaborador</th>
             <th>linea</th>
          </tr>
       </thead>
       
       <tbody>
         
         <tr ng-repeat="asignacion in asignacions">
            <td>@{{asignacion.id}}</td>
            <td>@{{asignacion.user.name}}</td>
            <td>@{{asignacion.lista.nombre}}</td>
        </tr>
         
       </tbody>
       
    </table>

<a href = "app_asignar_colaborador" class = "btn btn-default" role = "button" >Nueva asignacion</a>
<a href = "#" class = "btn btn-default" role = "button" >Salir</a>
</div>



</div>
</div>

</div>
<div id="footer" ng-include="'footer'"></div>	
</body>
</html>