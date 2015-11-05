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
	.controller("empresa_controller", function($scope, $http,$window){
		$scope.empresa = {};
		$scope.empresas = {};
		
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
		
		
		
		
		$scope.registrar_empresa=function(){
		    
		    $http({
		        url: "/empresas/create",
		        method: "GET",
		        params: $scope.empresa
		    })
        		.success(function(data){
                    $window.location.href ="/app_listar_empresas";
        		})
        		.error(function(err){
        			error(err.Message);
        		});
		}
		
	});

</script>

</head>

<body ng-controller="empresa_controller">
<div ng-include="'nav'"></div>
<div class = "container">

<div class = "panel panel-primary" style="border: 1px solid #868688;">
   <div class = "panel-heading" style="background: #868688;border: 1px solid #868688;">
      <h3 class = "panel-title" >Registro de nueva empresa</h3>
   </div>
   <div class = "panel-body" style="border: 1px solid #868688;">
   
   



	
	
<div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">	
    <form role="form">
    
    	<input type="text"  ng-model="empresa.nombre" class = "form-control" placeholder = "Ingrese nombre de la empresa"/><br/>
    	<input type="text"  ng-model="empresa.codigo" class = "form-control" placeholder = "Ingrese codigo de la empresa"/><br/>
    	<a href = "#" class = "btn btn-default" role = "button" ng-click="registrar_empresa()">Registrar</a>
    	<a href = "app_listar_empresas" class = "btn btn-default" role = "button" >Regresar</a>
    </form>
</div>




</div>
</div>

</div>
<div id="footer" ng-include="'footer'"></div>	
</body>
</html>