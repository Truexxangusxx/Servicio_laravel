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
		        url: "/users/create",
		        method: "GET",
		        params: $scope.nuevo_usuario
		    })
        		.success(function(data){
                    mensaje('Usuario registrado correctamente, revise su correo para activar su cuenta');
        		})
        		.error(function(err){
        			error(err.Message);
        	});
		   
		}
		
		
	});

</script>

</head>

<body ng-controller="first_controller">
<div ng-include="'nav'"></div>
<div class = "container">

<div class = "panel panel-primary" style="border: 1px solid #868688;">
   <div class = "panel-heading" style="background: #868688;border: 1px solid #868688;">
      <h3 class = "panel-title" >Registro de nuevo usuario</h3>
   </div>
   <div class = "panel-body" style="border: 1px solid #868688;">
   
   

	
<div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">	
    <form role="form">
    
    	<input type="text"  ng-model="nuevo_usuario.nombre" class = "form-control" placeholder = "Nombre"/><br/>
    	<input type="text"  ng-model="nuevo_usuario.email" class = "form-control" placeholder = "E-mail"/><br/>
    	<input type="password"  ng-model="nuevo_usuario.password" class = "form-control" placeholder = "Password"/><br/>
    	<input type="text"  ng-model="nuevo_usuario.dni" class = "form-control" placeholder = "DNI"/><br/>
    	
    	<a href = "#" class = "btn btn-default" role = "button" ng-click="registrar_usuario()">Registrar</a>
    	<a href = "#" class = "btn btn-default" role = "button" >Regresar</a>
    </form>
</div>

	

</div>
</div>

</div>
<div id="footer" ng-include="'footer'"></div>	
</body>
</html>