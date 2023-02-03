

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

  </style>
  
 
  
  <div id="primero">
  <ul>
    <li><a href="{{route('equipos.show', $equipo->id)}}">Fichas</a></li>
    <li><a href={{route('fotos.show', $equipo->id)}}>Fotos</a></li>
    <li><a href="{{route('historialPreventivo', $equipo->id)}}">Historial</a></li>
    <li><a href={{route('equipoTareash.show', $equipo->id)}}>Plan</a></li>
    <li><a href="{{route('protocolos.show', $equipo->id)}}">P.d.M.</a></li>
    <li><a href="{{route('documentos.show', $equipo->id)}}">Documentos</a></li>
    <li><a href={{route('equipos.edit', $equipo->id)}}>Editar</a></li>
    <li><a href={{route('ordentrabajo.list', $equipo->id)}}>OT</a></li>
    <li><a href="{{route('equipos.index')}}">Descargar</a></li>
    <li><a href="{{route('imprimirEquipo',$equipo->id )}}">Imprimir</a></li>
  </div>   


  </ul>
  
  




  
 
  
