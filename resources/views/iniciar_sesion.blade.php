    <!DOCTYPE html>
<html ng-app="app">
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
                    mensaje("el usuario "+data.name+" se ha logeado correctamente");
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
      <h3 class = "panel-title" >Iniciar sesion</h3>
   </div>
   <div class = "panel-body" style="border: 1px solid #868688;">
   
   

	
<div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">	
    <form role="form">
    
    	<input type="text" ng-model="user.email" class = "form-control" placeholder = "Correo"/><br/>
    	<input type="password"  ng-model="user.password" class = "form-control" placeholder = "Password"/><br/>
    	
    	<a href = "#" class = "btn btn-default" role = "button" ng-click="iniciar_sesion()">Ingresar</a>
    	<a href = "#" class = "btn btn-default" role = "button" >Cancelar</a>
    </form>
</div>

	

</div>
</div>

</div>
<div id="footer" ng-include="'footer'"></div>	
</body>
</html>