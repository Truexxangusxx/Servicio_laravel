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
		
		
		$http({
		        url: "/usuario_logeado",
		        method: "GET"
		    })
        		.success(function(data){
                    console.log(data);
        		})
        		.error(function(err){
        			console.log(err);
        	});
		
		
		
		$scope.iniciar_sesion=function(){
		   
		   $http({
		        url: "/iniciar_sesion",
		        method: "GET",
		        params: $scope.user
		    })
        		.success(function(data){
        		    console.log(data);
                    alert("el usuario "+data.name+" se ha logeado correctamente");
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
    <h2>Iniciar sesion</h2>
    	<input type="text" ng-model="user.email" class = "form-control" placeholder = "Correo"/><br/>
    	<input type="password"  ng-model="user.password" class = "form-control" placeholder = "Password"/><br/>
    	
    	<a href = "#" class = "btn btn-default" role = "button" ng-click="iniciar_sesion()">Ingresar</a>
    	<a href = "#" class = "btn btn-default" role = "button" >Cancelar</a>
    </form>
</div>

	

	
</body>
</html>