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
	.controller("atencion_controller", function($scope, $http,$window){
		$scope.atencion = {};
		$scope.usuarios = {};
		
		
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
		        url: "/obtener_sesion_atencion",
		        method: "GET",
		        params: $scope.atencion
		    })
        		.success(function(data){
                    $scope.atencion=data;
        		})
        		.error(function(err){
        			console.log(err);
        		});
        		
		
		
		$scope.generar_ticket=function(){
		    $scope.atencion.user_id=$scope.sesion.id;
		    $http({
		        url: "/generar_ticket",
		        method: "GET",
		        params: $scope.atencion
		    })
        		.success(function(data){
                    $scope.atencion=data;
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

<div class = "panel panel-primary">
   <div class = "panel-heading">
      <h3 class = "panel-title">Consultar estado de ticket</h3>
   </div>
   <div class = "panel-body">
   



	

<div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">	
    <form role="form">
    
        
        <input type="text"  ng-model="atencion.codigo" class = "form-control" placeholder = "Ingrese codigo de seguridad"/><br/>
        <a href = "#" class = "btn btn-default" role = "button" ng-click="generar_ticket()">Generar ticket</a>
        
        <div>
        <h4>Numero: <span class = "label label-default">@{{atencion.numero}}</span></h4>
        <h4>Linea: <span class = "label label-default">@{{atencion.lista.empresa.nombre}}-@{{atencion.lista.nombre}}</span></h4>
        <h4>Predecesores: <span class = "label label-default">@{{atencion.predecesores}}</span></h4>
        <h4>Tiempo estimado: <span class = "label label-default">@{{atencion.tiempo}}</span></h4>
        
        <br/>
    	<a href = "app_solicitar_ticket" class = "btn btn-default" role = "button">Nuevo</a>
    	<a href = "#" class = "btn btn-default" role = "button" >Actualizar</a>
    	<a href = "#" class = "btn btn-default" role = "button" >Cancelar</a>
        </div>
        
    </form>
</div>



</div>
</div>

</div>
<div id="footer" ng-include="'footer'"></div>	
</body>
</html>