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
	.controller("atencion_controller", function($scope, $http,$window){
		$scope.atencion = {};
		$scope.empresas = {};
		$scope.listas = {};
		$scope.usuarios = {};
		
		
		
		$http({
		        url: "/empresas",
		        method: "GET"
		    })
        		.success(function(data){
                    $scope.empresas=data;
        		})
        		.error(function(err){
        			console.log(err);
        		});
        		
        		
        $http({
		        url: "/users",
		        method: "GET",
		        params: {"colaborador":0}
		    })
        		.success(function(data){
                    $scope.usuarios=data;
        		})
        		.error(function(err){
        			console.log(err);
        		});
		
		
		
		
		$scope.registrar_atencion=function(){
		    
		    $http({
		        url: "/atencions/create",
		        method: "GET",
		        params: $scope.nueva_atencion
		    })
        		.success(function(data){
                    mensaje(data);
        		})
        		.error(function(err){
        			console.log(err);
        			error(err.Message);
        		});
		}
		
		$scope.listar_listas=function(){
		    
		    $http({
		        url: "/listas",
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

<body ng-controller="atencion_controller">
<div ng-include="'nav'"></div>
<div class = "container">

<div class = "panel panel-primary" style="border: 1px solid #868688;">
   <div class = "panel-heading" style="background: #868688;border: 1px solid #868688;">
      <h3 class = "panel-title" >Solicitar ticket</h3>
   </div>
   <div class = "panel-body" style="border: 1px solid #868688;">
   



	
	
<div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">	
    <form role="form">
    
        <select class = "form-control" ng-model="nueva_atencion.user_id" ng-options="item.id as item.name for item in usuarios track by item.id">
            <option value="">Temporalmente seleccione un usuario</option>
        </select><br/>
        <select class = "form-control" ng-model="empresa" ng-options="item.id as item.nombre for item in empresas track by item.id" ng-change="listar_listas()">
            <option value="">Seleccione una empresa</option>
        </select><br/>
        <select class = "form-control" ng-model="nueva_atencion.lista_id" ng-options="item.id as item.nombre for item in listas track by item.id">
            <option value="">Seleccione una lista</option>
        </select><br/>
    	<select class = "form-control" ng-model="nueva_atencion.modo" >
            <option value="">Seleccione un modo de recepcion</option>
            <option value="correo">correo</option>
            <option value="sms">sms</option>
        </select><br/>
    	<a href = "#" class = "btn btn-default" role = "button" ng-click="registrar_atencion()">Registrar</a>
    	<a href = "#" class = "btn btn-default" role = "button" >Regresar</a>
    </form>
</div>



</div>
</div>

</div>
<div id="footer" ng-include="'footer'"></div>	
</body>
</html>