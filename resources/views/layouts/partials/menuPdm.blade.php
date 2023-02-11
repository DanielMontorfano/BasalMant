

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
          <li><a href="{{route('protocolos.show', $protocolo->id)}}">Ver</a></li>
          <li><a href={{route('protocolos.edit', $protocolo->id)}}>Editar</a></li>
          
           
          <div id="segundo">
          
              <li>  <a href="">"{{$protocolo->codigo}}"</a>  </li>
              
            
         </div>
       
       
        </ul> 
     </div>  
   


   




  
 
  
