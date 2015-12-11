<script>

function mensaje(msg){
$("#error").hide();
$("#mensaje a").text(msg);
    $("#mensaje").fadeIn('slow');
$("#mensaje a").click(function (e) {
        $("#mensaje").hide();
});
}

function error(msg){
$("#mensaje").hide();
$("#error a").text(msg);
    $("#error").fadeIn('slow');
$("#error a").click(function (e) {
        $("#error").hide();
    });
}



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

