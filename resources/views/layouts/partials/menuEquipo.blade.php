

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
    color: rgb(21, 226, 103);
    text-align: center;
    padding: 16px;
    text-decoration: none;
  }
  
  #segundo li a:hover {
    background-color: transparent;
  }




  </style>
  
  
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
   


   




  
 
  
