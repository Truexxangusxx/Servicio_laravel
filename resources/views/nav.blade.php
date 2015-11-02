<nav id = "navbar-example" class = "navbar navbar-default navbar-static" role = "navigation">
   
   <div class = "navbar-header">
      <button class = "navbar-toggle" type = "button" data-toggle = "collapse" 
         data-target = ".bs-js-navbar-scrollspy">
         <span class = "sr-only"></span>
         <span class = "icon-bar"></span>
         <span class = "icon-bar"></span>
         <span class = "icon-bar"></span>
      </button>
		
      <a class = "navbar-brand" href = "#">Electrodata gestion de colas</a>
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