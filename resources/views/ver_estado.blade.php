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
	
	
    <script src="https://rawgithub.com/gsklee/ngStorage/master/ngStorage.js"></script>
    
	
<script>

angular.module("colas", ['ngStorage'])
	.controller("atencion_controller", function($scope, $http,$window,$localStorage){
		$scope.atencion = {};
		$scope.usuarios = {};
		$scope.$storage = $localStorage.$default({
          codigo: "",
          user_id: 0
        });
        $scope.atencion.codigo=$scope.$storage.codigo;
        $scope.atencion.user_id=$scope.$storage.user_id;
        
        $http({
		        url: "/generar_ticket",
		        method: "GET",
		        params: $scope.atencion
		    })
        		.success(function(data){
                    $scope.atencion=data;
                    $scope.$storage.codigo=data.codigo;
                    $scope.$storage.user_id=data.user_id;
        		})
        		.error(function(err){
        			console.log(err);
        		});
        		
		
		$http({
		        url: "/obtener_sesion",
		        method: "GET"
		    })
        		.success(function(data){
                    console.log(data);
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
	
		
		
		
		$scope.generar_ticket=function(){
		    
		    $http({
		        url: "/generar_ticket",
		        method: "GET",
		        params: $scope.atencion
		    })
        		.success(function(data){
                    $scope.atencion=data;
                    $scope.$storage.codigo=data.codigo;
                    $scope.$storage.user_id=data.user_id;
        		})
        		.error(function(err){
        			console.log(err);
        		});
		}
		
		$scope.cancelar_ticket=function(){
		    
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
		
		$scope.nuevo_ticket=function(){
		    
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
      <h3 class = "panel-title" >Consultar estado de ticket</h3>
   </div>
   <div class = "panel-body" style="border: 1px solid #868688;">
   



	

<div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">	
    <form role="form">
    
        <select class = "form-control" ng-model="atencion.user_id" ng-options="item.id as item.name for item in usuarios track by item.id">
            <option value="">Temporalmente seleccione un usuario</option>
        </select><br/>
        <input type="text"  ng-model="atencion.codigo" class = "form-control" placeholder = "Ingrese codigo de seguridad"/><br/>
        <a href = "#" class = "btn btn-default" role = "button" ng-click="generar_ticket()">Generar ticket</a>
        
        <div>
        <h4>Numero: <span class = "label label-default">@{{atencion.numero}}</span></h4>
        <h4>Linea: <span class = "label label-default">@{{atencion.lista.empresa.nombre}}-@{{atencion.lista.nombre}}</span></h4>
        <h4>Predecesores: <span class = "label label-default">@{{atencion.predecesores}}</span></h4>
        <h4>Tiempo estimado: <span class = "label label-default">@{{atencion.tiempo}}</span></h4>
        
        <br/>
    	<a href = "#" class = "btn btn-default" role = "button" ng-click="registrar_atencion()">Nuevo</a>
    	<a href = "/views/listar_atenciones.html" class = "btn btn-default" role = "button" >Actualizar</a>
    	<a href = "#" class = "btn btn-default" role = "button" ng-click="registrar_atencion()">Cancelar</a>
        </div>
        
    </form>
</div>



</div>
</div>

</div>
<div id="footer" ng-include="'footer'"></div>	
</body>
</html>