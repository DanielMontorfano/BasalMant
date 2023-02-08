

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
          <li><a href="{{route('equipos.show', $equipo->id)}}">Ficha</a></li>
          <li><a href={{route('fotos.show', $equipo->id)}}>Fotos</a></li>
          <li><a href="{{route('historialPreventivo', $equipo->id)}}">Historial</a></li>
          <li><a href={{route('equipoTareash.show', $equipo->id)}}>Plan</a></li>
          <li><a href="{{route('documentos.show', $equipo->id)}}">Documentos</a></li>
          <li><a href={{route('equipos.edit', $equipo->id)}}>Editar</a></li>
          <li><a href={{route('ordentrabajo.list', $equipo->id)}}>OT</a></li>
          <li><a href="{{route('imprimirEquipo',$equipo->id )}}">Imprimir </a></li>
           
          <div id="segundo">
          
              <li>  <a href="">"{{$equipo->codEquipo}}"</a>  </li>
              
            
         </div>
       
       
        </ul> 
     </div>  
   


   




  
 
  
