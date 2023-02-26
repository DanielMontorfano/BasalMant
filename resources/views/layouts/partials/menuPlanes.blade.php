

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
    cursor: hand;
    cursor: grab;
    cursor: -moz-grab;
    cursor: -webkit-grab;
  }
  
  #primero li a {
       cursor: pointer;
  }
  #primero li a:hover {
  
    cursor: hand;
    cursor: grab;
 
  }


  </style>
  
  
      <div id="primero">
        <ul>
          <li><a href="{{route('plans.show', $plan->id)}}">Ver</a></li>
          <li><a href={{route('plans.edit', $plan->id)}}>Editar</a></li>
          {{--  <li><a href={{route('plans.copiar', $plan->id)}}>Copiar</a></li> --}}
          <li> <a onclick="mostrarAdvertencia()">Copiar</a>  </li> 
          <div id="segundo">
             <li>  <a href="">"{{$plan->codigo}}"</a>  </li>
          </div>
       
       
        </ul> 
     </div>  
     @section('js')
     <script> console.log('Hi!'); </script>
     <script>
       function mostrarAdvertencia() {
         if (confirm("¿Está seguro que desea copiar este plan?  Se aconseja para el caso de mismos P.d.M y mismas tareas, pero con frecuencias y duraciones distintas ya que luego de copiar podrá editar sin afectar al plan original")) {
          window.location.href = "{{ route('plans.copiar', $plan->id) }}";
           alert("Acción realizada");
         } else {
           // Acción si se rechaza la advertencia
          // alert("Acción cancelada");
         }
       }
       </script>
     @stop


   




  
 
  
