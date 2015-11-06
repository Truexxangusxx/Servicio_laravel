 var app = angular.module('app', []);

    
var generic_controller = function($scope, $http){
    
    

}

app.controller("first_controller", function($scope, $http,$window){
		
        $scope.nuevo_usuario={};
	
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
		
		
		$scope.iniciar_sesion=function(){
		   $http({
		        url: "/iniciar_sesion",
		        method: "GET",
		        params: $scope.user
		   })
        		.success(function(data){
        		    console.log(data);
                    $window.location.href ="/app_solicitar_ticket";
        		})
        		.error(function(err){
        			error(err.Message);
        	});
		   
		}
		
		
	});
