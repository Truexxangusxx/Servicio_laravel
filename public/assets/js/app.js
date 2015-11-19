var app = angular.module('app', []);

    
var generic_controller = function($scope, $http){
    
    

}
//first_controller------------------------------------------------------------------------------------------------------------------------------
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


//asignar_colaborador------------------------------------------------------------------------------------------------------------------------------
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
                    $window.location.href ="/app_listar_asignaciones";
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

//atencion_controller------------------------------------------------------------------------------------------------------------------------------
app.controller("atencion_controller", function($scope, $http,$window){
		$scope.atencions = {};
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


//empresa_controller------------------------------------------------------------------------------------------------------------------------------
app.controller("empresa_controller", function($scope, $http,$window){
		$scope.empresa = {};
		$scope.empresas = {};
		
		
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
		        method: "GET",
		    })
        		.success(function(data){
                    $scope.empresas=data;
        		})
        		.error(function(err){
        			console.log(err);
        		});
		
		
		
		
		$scope.registrar_empresa=function(){
		    
		    $http({
		        url: "/empresas/create",
		        method: "GET",
		        params: $scope.empresa
		    })
        		.success(function(data){
                    $window.location.href ="/app_listar_empresas";
        		})
        		.error(function(err){
        			error(err.Message);
        		});
		}
		
	});

//lista_controller------------------------------------------------------------------------------------------------------------------------------
app.controller("lista_controller", function($scope, $http,$window){
		$scope.nueva_lista = {};
		$scope.empresas = {};
		
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
		        method: "GET",
		    })
        		.success(function(data){
                    $scope.empresas=data;
        		})
        		.error(function(err){
        			console.log(err);
        		});
		
		
		
		
		$scope.registrar_lista=function(){
		    
		    $http({
		        url: "/listas/create",
		        method: "GET",
		        params: $scope.nueva_lista
		    })
        		.success(function(data){
                    $window.location.href ="/app_listar_listas";
        		})
        		.error(function(err){
        			error(err.Message);
        		});
		}
		
});

//crear_user_controller-----------------------------------------------------------------------------------------------------------------------------
app.controller("crear_user_controller", function($scope, $http){
		
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

//asignacion_controller-----------------------------------------------------------------------------------------------------------------------------
app.controller("asignacion_controller", function($scope, $http,$window){
		$scope.asignacions = {};
		
		
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
		        url: "/asignacions",
		        method: "GET"
		    })
        		.success(function(data){
                    $scope.asignacions=data;
        		})
        		.error(function(err){
        			console.log(err);
        		});
        		
		
		
	});

//empresa_controller-----------------------------------------------------------------------------------------------------------------------------
app.controller("empresa_controller", function($scope, $http){
		
		$scope.empresas = {};
		
		
		
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
		        method: "GET",
		    })
        		.success(function(data){
                    $scope.empresas=data;
        		})
        		.error(function(err){
        			console.log(err);
        		});
	
		
		
	});

//listar_lista_controller-----------------------------------------------------------------------------------------------------------------------------
app.controller("listar_lista_controller", function($scope, $http){
		
		$scope.listas = {};
		
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
		        url: "/listas",
		        method: "GET",
		    })
        		.success(function(data){
                    $scope.listas=data;
        		})
        		.error(function(err){
        			console.log(err);
        		});
	
		
		
	});

//solicitar_ticket_controller--------------------------------------------------------------------------------------------------------------------
app.controller("solicitar_ticket_controller", function($scope, $http,$window){
		$scope.atencion = {};
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
		        params: {"colaborador":0}
		    })
        		.success(function(data){
                    $scope.usuarios=data;
        		})
        		.error(function(err){
        			console.log(err);
        		});
		
		
		
		
		$scope.registrar_atencion=function(){
            $scope.nueva_atencion.user_id = $scope.sesion.id;
		    $http({
		        url: "/atencions/create",
		        method: "GET",
		        params: $scope.nueva_atencion
		    })
        		.success(function(data){
                    
                    if ($scope.nueva_atencion.modo =="correo")
                    {
                        mensaje(data);
                    }
                    else{
                        $("#impresion h1").text(data);
                        $scope.printDiv("impresion");    
                    }
                    
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
		
		$scope.printDiv = function(divName) {
          var printContents = document.getElementById(divName).innerHTML;
          var popupWin = window.open('', '_blank', 'width=300,height=300');
          popupWin.document.open()
          popupWin.document.write('<html><head><link rel="stylesheet" type="text/css" href="style.css" /></head><body onload="window.print()">' + printContents + '</html>');
          popupWin.document.close();
        }
		
		
	});

//ver_estado_controller-----------------------------------------------------------------------------------------------------------------------------
app.controller("ver_estado_controller", function($scope, $http,$window){
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
