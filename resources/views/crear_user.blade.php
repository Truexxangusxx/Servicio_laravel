<!DOCTYPE html>
<html ng-app="app">
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

angular.module("app",[])
	.controller("first_controller", function($scope, $http){
		
        $scope.nuevo_usuario={};
		
		$scope.registrar_usuario=function(){
		   
		   $http({
		        url: "http://uxkkff16f65f.xxangusxx.koding.io:8000/users/create",
		        method: "GET",
		        params: $scope.nuevo_usuario
		    })
        		.success(function(data){
                    alert(data);
        		})
        		.error(function(err){
        			alert(err);
        	});
		   
		}
		
		
	});

</script>

</head>

<body ng-controller="first_controller">



<div ng-include="'nav'"></div>


	
<div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">	
    <form role="form">
    <h2>Registro de nuevo usuario</h2>
    	<input type="text"  ng-model="nuevo_usuario.nombre" class = "form-control" placeholder = "Nombre"/><br/>
    	<input type="text"  ng-model="nuevo_usuario.email" class = "form-control" placeholder = "E-mail"/><br/>
    	<input type="password"  ng-model="nuevo_usuario.password" class = "form-control" placeholder = "Password"/><br/>
    	<input type="text"  ng-model="nuevo_usuario.dni" class = "form-control" placeholder = "DNI"/><br/>
    	
    	<a href = "#" class = "btn btn-default" role = "button" ng-click="registrar_usuario()">Registrar</a>
    	<a href = "#" class = "btn btn-default" role = "button" >Cancelar</a>
    </form>
</div>

	

	
</body>
</html>