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
	.controller("lista_controller", function($scope, $http,$window){
		$scope.nueva_lista = {};
		$scope.empresas = {};
		
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
		        url: "/empresas",
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
		        url: "/listas/create",
		        method: "GET",
		        params: $scope.nueva_lista
		    })
        		.success(function(data){
                    $window.location.href ="/app_listar_listas";
        		})
        		.error(function(err){
        			error(err.Message);
        		});
		}
		
	});

</script>

</head>

<body ng-controller="lista_controller">
<div ng-include="'nav'"></div>
<div class = "container">

<div class = "panel panel-primary">
   <div class = "panel-heading">
      <h3 class = "panel-title">Registro de nueva linea</h3>
   </div>
   <div class = "panel-body">
   
   


	

<div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">	
    <form role="form">
    
        <select class = "form-control" ng-model="nueva_lista.empresa_id" ng-options="item.id as item.nombre for item in empresas track by item.id">
        <option value="">Seleccione una empresa</option>
        </select><br/>
    	<input type="text"  ng-model="nueva_lista.nombre" class = "form-control" placeholder = "Ingrese nombre de la linea"/><br/>
    	<input type="text"  ng-model="nueva_lista.codigo" class = "form-control" placeholder = "Ingrese codigo de la linea"/><br/>
    	<a href = "#" class = "btn btn-default" role = "button" ng-click="registrar_lista()">Registrar</a>
    	<a href = "app_listar_listas" class = "btn btn-default" role = "button" >Regresar</a>
    </form>
</div>





</div>
</div>

</div>
<div id="footer" ng-include="'footer'"></div>		
</body>
</html>