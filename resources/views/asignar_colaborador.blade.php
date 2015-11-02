<!DOCTYPE html>
<html ng-app="colas">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap 101 Template</title>

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
 	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.7/angular.min.js"></script>
	
<script>

angular.module("colas",[])
	.controller("asignacion_controller", function($scope, $http,$window){
		$scope.asignacion = {};
		$scope.empresas = {};
		$scope.listas = {};
		$scope.usuarios = {};
		
		$http({
		        url: "http://uxkkff16f65f.xxangusxx.koding.io:8000/empresas",
		        method: "GET"
		    })
        		.success(function(data){
                    $scope.empresas=data;
        		})
        		.error(function(err){
        			console.log(err);
        		});
        		
        		
        $http({
		        url: "http://uxkkff16f65f.xxangusxx.koding.io:8000/users",
		        method: "GET",
		        params: {"colaborador":1}
		    })
        		.success(function(data){
                    $scope.usuarios=data;
        		})
        		.error(function(err){
        			console.log(err);
        		});
		
		
		
		
		$scope.registrar_asignacion=function(){
		    
		    $http({
		        url: "http://uxkkff16f65f.xxangusxx.koding.io:8000/asignacions/create",
		        method: "GET",
		        params: $scope.nueva_asignacion
		    })
        		.success(function(data){
                    $window.location.href ="/views/listar_asignaciones.html";
        		})
        		.error(function(err){
        			console.log(err);
        		});
		}
		
		$scope.listar_listas=function(){
		    
		    $http({
		        url: "http://uxkkff16f65f.xxangusxx.koding.io:8000/listas",
		        method: "GET",
		        params: {"empresa_id":$scope.empresa}
		    })
        		.success(function(data){
                    $scope.listas=data;
        		})
        		.error(function(err){
        			alert(err);
        		});
		}
		
		
	});

</script>

</head>

<body ng-controller="asignacion_controller">



<div ng-include="'nav'"></div>



	
	
<div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">	
    <form role="form">
    <h2>Registro de nueva asignacion</h2>
        <select class = "form-control" ng-model="empresa" ng-options="item.id as item.nombre for item in empresas track by item.id" ng-change="listar_listas()">
            <option value="">Seleccione una empresa</option>
        </select><br/>
        <select class = "form-control" ng-model="nueva_asignacion.lista_id" ng-options="item.id as item.nombre for item in listas track by item.id">
            <option value="">Seleccione una empresa</option>
        </select><br/>
    	<select class = "form-control" ng-model="nueva_asignacion.user_id" ng-options="item.id as item.name for item in usuarios track by item.id">
            <option value="">Seleccione una empresa</option>
        </select><br/>
    	<a href = "#" class = "btn btn-default" role = "button" ng-click="registrar_asignacion()">Registrar</a>
    	<a href = "app_listar_asignaciones" class = "btn btn-default" role = "button" >Regresar</a>
    </form>
</div>



	
</body>
</html>