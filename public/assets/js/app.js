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



app.controller("asignar_colaborador", function($scope, $http,$window){
		$scope.asignacion = {};
		$scope.empresas = {};
		$scope.listas = {};
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
		        params: {"colaborador":1}
		    })
        		.success(function(data){
                    $scope.usuarios=data;
        		})
        		.error(function(err){
        			console.log(err);
        		});
		
		
		
		
		$scope.registrar_asignacion=function(){
		    
		    $http({
		        url: "/asignacions/create",
		        method: "GET",
		        params: $scope.nueva_asignacion
		    })
        		.success(function(data){
                    $window.location.href ="/views/listar_asignaciones.html";
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