<!DOCTYPE html>
<html ng-app="colas">
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

angular.module("colas",[])
	.controller("empresa_controller", function($scope, $http){
		
		$scope.empresas = {};
		
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

</script>

</head>

<body ng-controller="empresa_controller">




<div ng-include="'nav'"></div>






<div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">	

    <table class = "table table-striped">
       <caption>Lista de empresas</caption>
       
       <thead>
          <tr>
             <th>id</th>
             <th>nombre</th>
             <th>codigo</th>
          </tr>
       </thead>
       
       <tbody>
         
         <tr ng-repeat="empresa in empresas">
            <td>@{{empresa.id}}</td>
            <td>@{{empresa.nombre}}</td>
            <td>@{{empresa.codigo}}</td>
        </tr>
         
       </tbody>
       
    </table>

<a href = "app_crear_empresa" class = "btn btn-default" role = "button" >Nueva empresa</a>
<a href = "#" class = "btn btn-default" role = "button" >Salir</a>
</div>



	
</body>
</html>