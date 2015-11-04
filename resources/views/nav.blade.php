<script>

function mensaje(msg){
$("#mensaje a").text(msg);
    $("#mensaje").fadeIn('slow');
}

function error(msg){
$("#error a").text(msg);
    $("#error").fadeIn('slow');
}
</script>

<style>
html,
body {
  height: 100%;
}


#footer {
  height: 60px;
  background-color: #F8F8F8;
  border: 1px solid #e7e7e7;
}

.container {
  width: auto;
  max-width: 800px;
  padding: 0 15px;
  min-height: 76.7%;
}
.container .credit {
  margin: 20px 0;
}
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
		
      <a class = "navbar-brand" href = "http://www.electrodata.com.pe" style="padding-top:10px;" ><img src="data:image/jpeg;base64,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"></a>
   </div>
   
   <div class = "collapse navbar-collapse bs-js-navbar-scrollspy">
      <ul class = "nav navbar-nav">
         
         <li class = "dropdown">
            <a href = "#" id = "navbarDrop1" class = "dropdown-toggle" data-toggle = "dropdown">
               Mantenimientos
               <b class = "caret"></b>
            </a>
            <ul class = "dropdown-menu" role = "menu" aria-labelledby = "navbarDrop1">
               <li><a href = "app_listar_empresas" tabindex = "-1">Empresas</a></li>
               <li><a href = "app_listar_listas" tabindex = "-1">listas</a></li>
            </ul>
         </li>
         <li class = "dropdown">
            <a href = "#" id = "navbarDrop1" class = "dropdown-toggle" data-toggle = "dropdown">
               Sesion
               <b class = "caret"></b>
            </a>
            <ul class = "dropdown-menu" role = "menu" aria-labelledby = "navbarDrop1">
               <li><a href = "app_iniciar_sesion" tabindex = "-1">Iniciar sesion</a></li>
               <li><a href = "app_crear_user" tabindex = "-1">Registrar usuario</a></li>
            </ul>
         </li>
         
         <li><a href = "app_listar_asignaciones">Asignacion</a></li>
         <li><a href = "app_atender_lista">Atencion</a></li>
         <li><a href = "app_registrar_accesos">Accesos</a></li>
         <li><a href = "app_solicitar_ticket">Solicitar ticket</a></li>
         <li><a href = "app_ver_estado">Estado de atencion</a></li>

      </ul>
   </div>
   
</nav>






