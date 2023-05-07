

  <style>
  
  #primero ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color:rgb(35, 37, 36);
  }
  
  #primero li {
    float: left;
  }
  
  #primero li a {
    display: block;
    color: white;
    text-align: center;
    padding: 16px;
    text-decoration: none;
  }
  
  #primero li a:hover {
    background-color: #0e0810;
  }
  
  





  #segundo ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color:transparent
  }
  
  #segundo li {
  float: right;
}

#segundo li a {
  display: block;
  padding: 10px;
  color: rgb(21, 226, 103);
}
  
    
  #segundo li a:hover {
    background-color: transparent;
  }

  .custom-nav {
  background-image: linear-gradient(to bottom, rgb(120, 117, 117),rgb(9, 8, 8));
}
.nav-item.active {
  background-color: transparent;
}
.navbar-nav .active > .menu-link {
  color: orange !important;
}

.dropdown-menu {
        background-image: linear-gradient(to bottom, #372f2f, #ffffff); /* Definir degradado de gris a blanco */
    }
    .dropdown-menu a:hover {
        background-color: #2f2c2c; /* Cambiar el color de hover a negro */
        color: #ffffff; /* Cambiar el color del texto a blanco */
    }


  </style>

  <!--
  <div id="primero">
    <ul>
      <li><a title="Ver la ficha de equipo" href="{{route('equipos.show', $equipo->id)}}">Ficha</a></li>
      <li><a title="Ver imágenes de este equipo" href={{route('fotos.show', $equipo->id)}}>Fotos</a></li>
      <li><a title="Ver trabajos relizados sobre este equipo" href="{{route('historialPreventivo', $equipo->id)}}">Historial</a></li>
      <li><a title="Ver plan de mantenimiento de este esquipo" href={{route('equipoTareash.show', $equipo->id)}}>Plan</a></li>
      <li><a title="Permite ver documentos adjuntos" href="{{route('documentos.show', $equipo->id)}}">Documentos</a></li>
      <li><a title="Permite editar este equipo" href={{route('equipos.edit', $equipo->id)}}>Editar</a></li>
      <li><a title="Permite ver y generar ódenes sobre este equipo" href={{route('ordentrabajo.list', $equipo->id)}}>OT</a></li>
      <li><a title="Permite clonar este equipo" href={{route('equipos.clonar', $equipo->id)}}>Clonar</a></li>
      <li><a title="Permite cargar el formulario del plan" href="{{route('equipoTareash.edit', $equipo->id)}}">Formulario</a></li>
      <li><a title="Imprime la ficha de este equipo" href="{{route('imprimirEquipo',$equipo->id )}}">Imprimir </a></li> 
      <div id="segundo">
      
          <li>  <a href="">"{{$equipo->codEquipo}}"</a>  </li>
          
        
     </div>
   
   
    </ul> 
 </div>  
      
   
   <br>
   -->
   <div class="container">
   
   
   <nav class="navbar navbar-expand-lg navbar-dark  custom-nav">
    @php
  $rutaActual = Route::currentRouteName();
@endphp
    <ul class="navbar-nav mr-auto">
      <li class="nav-item {{ $rutaActual == 'equipos.show' ? 'active' : '' }}">
        <a class="nav-link menu-link" title="Ver la ficha de equipo" href="{{route('equipos.show', $equipo->id)}}">Ficha</a>
      </li>
      <li class="nav-item {{ $rutaActual == 'fotos.show' ? 'active' : '' }}">
        <a class="nav-link menu-link" title="Ver imágenes de este equipo" href="{{route('fotos.show', $equipo->id)}}">Fotos</a>
      </li>
      <li class="nav-item dropdown {{ ($rutaActual == 'equipoTareash.show' || $rutaActual == 'equipoTareash.edit' ) ? 'active' : '' }}">

        <a class="nav-link dropdown-toggle menu-link" title="Ver plan de mantenimiento de este esquipo" id="navbarDropdown1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Plan</a>
        <div class="dropdown-menu "  aria-labelledby="navbarDropdown1">
          <a class="dropdown-item" href={{route('equipoTareash.show', $equipo->id)}}>Ver plan de este equipo</a>
          <div class="dropdown-divider "></div>
          <a class="dropdown-item" href="{{route('equipoTareash.edit', $equipo->id)}}">Cargar formulario</a>
        </div>
      </li>

      
    <li class="nav-item dropdown {{ ($rutaActual == 'historialPreventivoEjecut' || $rutaActual == 'historialCorrectivo' || $rutaActual == 'historialPreventivo'|| $rutaActual == 'historialTodos') ? 'active' : ''  }}">
            <a class="nav-link dropdown-toggle menu-link" title="Ver trabajos relizados sobre este equipo" id="navbarDropdown2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Historial
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown2">
              <a class="dropdown-item" href="{{ route('historialPreventivoEjecut', $equipo->id) }}">Seguimiento del plan</a>
              <a class="dropdown-item" href="{{ route('historialCorrectivo', $equipo->id) }}">Correctivo</a>
              <a class="dropdown-item"  href="{{route('historialPreventivo', $equipo->id)}}">Preventivo</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="{{ route('historialTodos', $equipo->id) }}">Total</a>
            </div>
    </li>
    <li class="nav-item {{ $rutaActual == 'documentos.show' ? 'active' : '' }}">
      <a class="nav-link menu-link" title="Permite ver documentos adjuntos" href="{{route('documentos.show', $equipo->id)}}">Documentos</a>
    </li>
    <li class="nav-item {{ $rutaActual == 'equipos.edit' ? 'active' : '' }}">
      <a class="nav-link menu-link" title="Permite editar este equipo" href="{{route('equipos.edit', $equipo->id)}}">Editar</a>
    </li>
  </li>
  <li class="nav-item {{ $rutaActual == 'ordentrabajo.list' ? 'active' : '' }}">
    <a class="nav-link menu-link" title="Permite ver y generar ódenes sobre este equipo" href={{route('ordentrabajo.list', $equipo->id)}}>OT</a>
  </li>
  <li class="nav-item {{ $rutaActual == 'equipos.clonar' ? 'active' : '' }}">
    <a class="nav-link menu-link" title="Permite clonar este equipo" href={{route('equipos.clonar', $equipo->id)}}>Clonar</a>
  </li>
  
  <li class="nav-item dropdown {{ ($rutaActual == 'imprimirEquipo' || $rutaActual == 'imprimirPlan') ? 'active' : ''  }}">
    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown3" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      Imprimir
    </a>
    <div class="dropdown-menu" aria-labelledby="navbarDropdown3">
      <a class="dropdown-item bi bi-printer" title="Imprime la ficha de este equipo" href="{{route('imprimirEquipo',$equipo->id )}}">&nbsp; Ficha</a>
      <a class="dropdown-item bi bi-printer" href={{route('imprimirPlan', $equipo->id)}}>&nbsp; Plan</a>
      <div class="dropdown-divider"></div>
      <a class="dropdown-item" href="#">Estado general</a>
      <a class="dropdown-item" href="#">Ultima O.d.T</a>
    </div>
</li>
<div id="segundo">
          
  <li>  <a href="">"{{$equipo->codEquipo}}"</a>  </li>
  

</div>
  </ul>
    </nav>

   </div>
   

    <script>
      

    </script>
   




  
 
  
