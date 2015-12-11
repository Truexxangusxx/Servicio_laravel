var app = angular.module('app', [], function($interpolateProvider) {
    $interpolateProvider.startSymbol('[[');
    $interpolateProvider.endSymbol(']]');
});

    
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
        		    //console.log(data);
        		    if(data == "")
        		    {
        		        $window.location.href ="/app_iniciar_sesion";
        		    }
        		    else{
        		          
        		        $window.location.href ="/app_solicitar_ticket";
        		    }
                    
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
		    $('#myForm').validator('validate');
		    if ($('.has-error').length){
		        error('Complete correctamente los campos');
		    }
		    else{
    		    $http({
    		        url: "/asignacions/create",
    		        method: "GET",
    		        params: $scope.nueva_asignacion
    		    })
            		.success(function(data){
                        if (data.error){
                            error(data.msg);
                        }
                        else{
                            $window.location.href ="/app_listar_asignaciones";    
                        }
                        
            		})
            		.error(function(err){
            			console.log(err);
            			error(err.Message);
            		});
		    }
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
		$scope.user = {};
		
		
		function temporizador(){
    		$scope.mostrar_cola();
        }
        var timer = setInterval(temporizador, 10000);
		
		
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
        	}).then(function successCallback(response) {
                $http({
		        url: "/listas_por_user",
		        method: "GET",
		        params: {"user_id":$scope.sesion.id}
		        })
            		.success(function(data){
            		    console.log($scope.sesion);
                        $scope.listas=data;
                        $scope.user.lista_id = $scope.listas[0].id;
                        $scope.mostrar_cola();
            		})
            		.error(function(err){
            			error(err);
            		});
              }, function errorCallback(response) {
                
              });
	
	
		
		$scope.mostrar_cola=function(){
		    $scope.user.user_id=$scope.sesion.id
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
		    
		    if ($scope.atencions[0].colaborador_id==null){
		        error('El cliente no le esta asignado');
		    }
		    else{
		        $http({
		        url: "/atender_atencion",
		        method: "GET",
		        params: {"estado_id":estado,"id":$scope.atencions[0].id}
    		    })
            	.success(function(data){
                    
            	})
            	.error(function(err){
            		console.log(err);
            			error(err.Message);
            		})
                	.then(function successCallback(response) {
        
                        $scope.mostrar_cola();
                        
                          }, function errorCallback(response) {
                            
                          });    
		    }
		}
		
		
		$scope.asignar_atencion=function(){
		    
		        $http({
		        url: "/asignar_atencion",
		        method: "GET",
		        params: $scope.user
    		    })
            	.success(function(data){
                    $scope.mostrar_cola();
            	})
        		.error(function(err){
        			console.log(err);
        		});    
              
		    }
		
		
		
		
});


//crear_empresa_controller------------------------------------------------------------------------------------------------------------------------------
app.controller("crear_empresa_controller", function($scope, $http,$window){
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
		    $('#myForm').validator('validate');
		    if ($('.has-error').length){
		        error('Complete correctamente los campos');
		    }
		    else{
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
		    $('#myForm').validator('validate');
		    if ($('.has-error').length){
		        error('Complete correctamente los campos');
		    }
		    else{
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
		    $('#myForm').validator('validate');
		    if ($('.has-error').length){
		        error('Complete correctamente los campos');
		    }
		    else{
		        $http({
		        url: "/users/create",
		        method: "GET",
		        params: $scope.nuevo_usuario
    		    })
            		.success(function(data){
                        if (data.error){
                            error(data.msg);
                        }
                        else{
                            mensaje(data.msg);
                        }
            		})
            		.error(function(err){
            			error(err.Message);
            	});
		    }
		   
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
        		
		$scope.eliminar_asignacion=function(id){
		    
		    $http({
		        url: "/eliminar_asignacion",
		        method: "GET",
		        params: {"id":parseInt(id)}
		    })
        		.success(function(data){
                    $scope.asignacions=data;
        		})
        		.error(function(err){
        			error(err);
        		});
        	
		}
		
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
                    if ($scope.nueva_atencion.modo =="imprimir")
                    {
                        $("#impresion h1").text(data);
                        $scope.printDiv("impresion");    
                    }
                    if ($scope.nueva_atencion.modo =="sms")
                    {
                        $http({
					        url: "https://rest.nexmo.com/sms/json?api_key=1e6c4f1d&api_secret=d7484e91&from=NEXMO&to=51994085900&text="+data,
					        method: "GET"
					    })
			        		.success(function(data){
			                    mensaje("se envio el codigo de activacion a su celular");
			        		})
			        		.error(function(err){
			        			console.log(err);
			        		});
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

//accesos_controller-----------------------------------------------------------------------------------------------------------------------------
app.controller("accesos_controller", function($scope, $http,$window){
	    $scope.user = {};
		
		
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
		
        
		
		$scope.buscar_user=function(){
		    
		    $http({
		        url: "/buscar_user",
		        method: "GET",
		        params: $scope.user
		    })
        		.success(function(data){
                    $scope.user=data;
        		})
        		.error(function(err){
        			alert(err);
        		});
		}
		
		$scope.actualizar_user=function(){
		    
		    $http({
		        url: "/actualizar_user",
		        method: "GET",
		        params: $scope.user
		    })
        		.success(function(data){
                    $scope.user=data;
                    mensaje('Usuario modificado correctamente');
        		})
        		.error(function(err){
        			alert(err);
        		});
		}
		
		
	});

//reporte_controller-----------------------------------------------------------------------------------------------------------------------------
app.controller("reporte_controller", function($scope, $http,$window){
	    $scope.user = {};
	    $scope.elementos = {};
	    $scope.chart = {};
	    
		
		
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
		        url: "/reporte_1",
		        method: "GET",
		        params: $scope.user
		    })
        		.success(function(data2){
                    $scope.elementos=data2.reporte1;
                    $scope.chart=data2.reporte2;
                    
        		})
        		.error(function(err){
        			error(err);
        		}).then(function successCallback(response) {
                
                
                
        var data = $scope.chart;
                
        var placeholder = $("#placeholder");
		placeholder.unbind();

			$.plot(placeholder, data, {
				series: {
					pie: { 
						show: true,
						radius: 1,
						label: {
							show: true,
							radius: 3/4,
							formatter: labelFormatter,
							background: {
								opacity: 0.5
							}
						}
					}
				},
				legend: {
					show: false
				}
			});

			setCode([
				"$.plot('#placeholder', data, {",
				"    series: {",
				"        pie: {",
				"            show: true,",
				"            radius: 1,",
				"            label: {",
				"                show: true,",
				"                radius: 3/4,",
				"                formatter: labelFormatter,",
				"                background: {",
				"                    opacity: 0.5",
				"                }",
				"            }",
				"        }",
				"    },",
				"    legend: {",
				"        show: false",
				"    }",
				"});"
			]);
		
		$("#footer").prepend("Flot " + $.plot.version + " &ndash; ");

        
                
                
                
                
                
                
              }, function errorCallback(response) {
                
              });
        		
        		
        		
        		
		
		
		


        		
        		
        		
        		
        		
        		
		
	});

	function labelFormatter(label, series) {
		return "<div style='font-size:8pt; text-align:center; padding:2px; color:white;'>" + label + "<br/>" + Math.round(series.percent) + "%</div>";
	}

	function setCode(lines) {
		$("#code").text(lines.join("\n"));
	}
