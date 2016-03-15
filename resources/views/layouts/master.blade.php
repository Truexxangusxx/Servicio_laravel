<!DOCTYPE html>
<html ng-app="app" >
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistema de colas</title>

    <link href="{{ URL::asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ URL::asset('assets/css/personalizado.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ URL::asset('assets/css/examples.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ URL::asset('assets/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
 	<script src="{{ URL::asset('assets/js/jquery-1.11.3.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/angular.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/app.js') }}"></script>
    <script src="{{ URL::asset('assets/js/validator.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/jquery.flot.js') }}"></script>
    <script src="{{ URL::asset('assets/js/jquery.flot.pie.js') }}"></script>
</head>

<body ng-controller="@yield('controlador')">


<script>

function mensaje(msg){
$("#error").hide();
$("#mensaje a").text(msg);
    $("#mensaje").fadeIn('slow').delay(5000).fadeOut();
$("#mensaje a").click(function (e) {
        $("#mensaje").hide();
});
}

function error(msg){
$("#mensaje").hide();
$("#error a").text(msg);
    $("#error").fadeIn('slow').delay(5000).fadeOut();
$("#error a").click(function (e) {
        $("#error").hide();
    });
}


$(document).unbind("keyup").keyup(function(e){ 
    var code = e.which;
    if(code==13)
    {
        $(".defecto").click();
    }
});

</script>

<style>

</style>

<nav id = "navbar-example" class = "navbar navbar-default navbar-static" role = "navigation">
   
   <div class = "navbar-header">
      <button class = "navbar-toggle" type = "button" data-toggle = "collapse" 
         data-target = ".bs-js-navbar-scrollspy">
         <span class = "sr-only"></span>
         <span class = "icon-bar"></span>
         <span class = "icon-bar"></span>
         <span class = "icon-bar"></span>
      </button>
		
      <a class = "navbar-brand" href = "http://www.electrodata.com.pe" style="padding-top:10px;" ><img height="30px" src="{{ asset('assets/images/logo2.jpg') }}"></a>
   </div>
   
   <div class = "collapse navbar-collapse bs-js-navbar-scrollspy">
      <ul class = "nav navbar-nav">
         
         <li class = "dropdown" ng-if="sesion.name==Undefined">
            <a href = "#" id = "navbarDrop1" class = "dropdown-toggle" data-toggle = "dropdown">
               Sesion
               <b class = "caret"></b>
            </a>
            <ul class = "dropdown-menu" role = "menu" aria-labelledby = "navbarDrop1">
               <li><a href = "app_iniciar_sesion" tabindex = "-1">Iniciar sesion</a></li>
               <li><a href = "app_crear_user" tabindex = "-1">Registrar usuario</a></li>
            </ul>
         </li>
         <li ng-if="sesion.name!=Undefined"><a href = "cerrar_sesion">cerrar sesion ([[sesion.name]])</a></li>
         
         
         <li ng-if="sesion.admin==1" class = "dropdown">
            <a href = "#" id = "navbarDrop1" class = "dropdown-toggle" data-toggle = "dropdown">
               Mantenimientos
               <b class = "caret"></b>
            </a>
            <ul class = "dropdown-menu" role = "menu" aria-labelledby = "navbarDrop1">
               <li><a href = "app_listar_empresas" tabindex = "-1">Empresas</a></li>
               <li><a href = "app_listar_listas" tabindex = "-1">listas</a></li>
            </ul>
         </li>
        
        
        <li ng-if="sesion.admin==1"><a href = "app_listar_asignaciones">Asignacion</a></li>
        <li ng-if="sesion.colaborador==1 || sesion.admin==1"><a href = "app_atender_lista">Atencion</a></li>
        <li ng-if="sesion.admin==1"><a href = "accesos">Accesos</a></li>
        <li ng-if="sesion.name!=Undefined"><a href = "app_solicitar_ticket">Solicitar ticket</a></li>
        <li ng-if="sesion.name!=Undefined"><a href = "app_ver_estado">Estado de atencion</a></li>
        <li ng-if="sesion.admin==1"><a href = "app_reporte">Reporte 1</a></li>

      </ul>
   </div>

</nav>




<div class = "container">

<div class = "panel panel-primary">
   <div class = "panel-heading">
      <h3 class = "panel-title">@yield('title')</h3>
   </div>
   <div class = "panel-body">
   
   
<div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3"> 	
 @yield('content')
</div>
	

</div>
</div>

</div>
<div id="footer" ng-include="'footer'"></div>	
</body>
</html>