<!DOCTYPE html>
<html ng-app="colas">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistema de colas</title>

    <link href="{{ URL::asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
 	<script src="{{ URL::asset('assets/js/jquery-1.11.3.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/angular.min.js') }}"></script>
	
<script>

$(function () { $(".tooltip-options img").tooltip({html : true });});

angular.module("colas",[])
	.controller("atencion_controller", function($scope, $http,$window){
		$scope.atencions = {};
		$scope.listas = {};
		$scope.usuarios = {};
		
		
		
        $http({
		        url: "/users",
		        method: "GET",
		        params: {"colaborador":1}
		    })
        		.success(function(data){
                    $scope.usuarios=data;
        		})
        		.error(function(err){
        			console.log(err);
        		});
		
		
		
		$scope.mostrar_cola=function(){
		    
		    $http({
		        url: "/obtener_lista",
		        method: "GET",
		        params: $scope.user
		    })
        		.success(function(data){
                    $scope.atencions=data;
                    console.log($scope.atencions);
        		})
        		.error(function(err){
        			console.log(err);
        		});
        		
        		
        		$http({
		        url: "/ultimo_atendido",
		        method: "GET",
		        params: $scope.user
		    })
        		.success(function(data){
                    $scope.ultimo_atendido=data;
                    console.log($scope.ultimo_atendido);
        		})
        		.error(function(err){
        			console.log(err);
        		});
        		
		}
		
		
		$scope.atender_atencion=function(estado){
		    
		    $http({
		        url: "/atender_atencion",
		        method: "GET",
		        params: {"estado_id":estado,"id":$scope.atencions[0].id}
		    })
        		.success(function(data){
                    mensaje("atendido!!!, refresca la pagina");
        		})
        		.error(function(err){
        			console.log(err);
        			error(err.Message);
        		});
		}
		
		$scope.listar_listas=function(){
		    
		    $http({
		        url: "/listas_por_user",
		        method: "GET",
		        params: $scope.user
		    })
        		.success(function(data){
        		    console.log(data);
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
      <h3 class = "panel-title" >Registro de nueva asignacion</h3>
   </div>
   <div class = "panel-body" style="border: 1px solid #868688;">
   
   

	
<div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">	
    <form role="form">
    
        
     <select class = "form-control" ng-model="user.user_id" ng-options="item.id as item.name for item in usuarios track by item.id"  ng-change="listar_listas()">
            <option value="">Temporalmente seleccione un usuario</option>
     </select><br/>
     <select class = "form-control" ng-model="user.lista_id" ng-options="item.id as item.nombre for item in listas track by item.id" ng-change="mostrar_cola()">
            <option value="">Seleccione una lista</option>
        </select><br/>
    <div align="center" class="cont-img" style="padding:20px 0px 20px 0px;">
    
        <img style="margin: 5px;" class="img-responsive" src="https://pixabay.com/static/uploads/photo/2015/10/05/22/37/blank-profile-picture-973461__180.png" width="50" height="50">@{{ultimo_atendido.numero}}
        <span ng-repeat-start="atencion in atencions" ng-if="$first" big>
            <div style="border: 1.5px solid black;">@{{atencion.user.name}}<img data-placement = "right" data-toggle = "tooltip" title = "<h3>Jose Arturo Arias Davila</h3><h2>BVC32</h2>" style="margin: 5px;" class="img-responsive" src="https://pixabay.com/static/uploads/photo/2015/10/05/22/37/blank-profile-picture-973461__180.png" width="100" height="100">@{{atencion.numero}}</div>
        </span>
        <span ng-repeat-end ng-if="!$first">
            <img style="margin: 5px;" class="img-responsive" src="https://pixabay.com/static/uploads/photo/2015/10/05/22/37/blank-profile-picture-973461__180.png" width="50" height="50">@{{atencion.numero}}
        </span>
        
    </div>
   
    
        
        <br/>
    	<a href = "#" class = "btn btn-default" role = "button" ng-click="atender_atencion(2)">Atendido</a>
    	<a href = "#" class = "btn btn-default" role = "button" ng-click="atender_atencion(3)">Ausente</a>
    </form>
</div>


</div>
</div>

</div>
<div id="footer" ng-include="'footer'"></div>
</body>
</html>