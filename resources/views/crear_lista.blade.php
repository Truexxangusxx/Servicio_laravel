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
	.controller("lista_controller", function($scope, $http,$window){
		$scope.nueva_lista = {};
		$scope.empresas = {};
		
		
		
		$http({
		        url: "http://uxkkff16f65f.xxangusxx.koding.io:8000/empresas",
		        method: "GET",
		    })
        		.success(function(data){
                    $scope.empresas=data;
        		})
        		.error(function(err){
        			console.log(err);
        		});
		
		
		
		
		$scope.registrar_lista=function(){
		    
		    $http({
		        url: "http://uxkkff16f65f.xxangusxx.koding.io:8000/listas/create",
		        method: "GET",
		        params: $scope.nueva_lista
		    })
        		.success(function(data){
                    $window.location.href ="/views/listar_listas.html";
        		})
        		.error(function(err){
        			alert(err);
        		});
		}
		
	});

</script>

</head>

<body ng-controller="lista_controller">



<div ng-include="'nav'"></div>



	

<div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">	
    <form role="form">
    <h2>Registro de nueva linea</h2>
        <select class = "form-control" ng-model="nueva_lista.empresa_id" ng-options="item.id as item.nombre for item in empresas track by item.id">
        <option value="">Seleccione una empresa</option>
        </select><br/>
    	<input type="text"  ng-model="nueva_lista.nombre" class = "form-control" placeholder = "Ingrese nombre de la linea"/><br/>
    	<input type="text"  ng-model="nueva_lista.codigo" class = "form-control" placeholder = "Ingrese codigo de la linea"/><br/>
    	<a href = "#" class = "btn btn-default" role = "button" ng-click="registrar_lista()">Registrar</a>
    	<a href = "app_listar_listas" class = "btn btn-default" role = "button" >Regresar</a>
    </form>
</div>





	
</body>
</html>