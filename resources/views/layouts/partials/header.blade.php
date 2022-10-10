
<header>
 
  
    
         
            <ul><h6 STYLE="text-align:Left; font-size: 40px;
              background: -webkit-linear-gradient(rgb(216, 69, 6), rgb(239, 236, 217));
              -webkit-background-clip: text;
              -webkit-text-fill-color: transparent;">BasalMant </h6>
              
                {{-- en la siguiente linea utilizo ? como if, y : como else --}}
              <a href="{{route('home')}}" class="{{(request()->routeIs('home')) ? 'active' : ''}}">Home</a>
                  {{-- @dump(request()->routeIs('home')) para recordar de donde viene --}}
                    
              
                {{-- en la siguiente linea el * es para que aplique  clase a toda dir que empieza con equipos --}}
              <a href="{{route('equipos.index')}}" class="{{(request()->routeIs('equipos.*')) ? 'active' : ''}}">Equipos</a>
                    {{-- @dump(request()->routeIs('equipos.index')) --}}
              <a href="{{route('plans.index')}}" class="{{(request()->routeIs('plans.*')) ? 'active' : ''}}">Planes</a>
                    {{-- @dump(request()->routeIs('equipos.index')) --}}      
                {{-- en la siguiente linea el * es para que aplique  clase a toda dir que empieza con equipos --}}
              <a abbr title="Oden de trabajo" href="{{route('ordentrabajo.index')}}" class="{{(request()->routeIs('ordentrabajo.*')) ? 'active' : ''}}">O.d.T</a>
              {{-- @dump(request()->routeIs('equipos.index')) --}}
                                
                <a  href="{{route('tareas.index')}}" class="{{(request()->routeIs('tareas.*')) ? 'active' : ''}}">Tareas</a>
                <a abbr title="Procedimiento de mantenimiento" href="{{route('protocolos.index')}}" class="{{(request()->routeIs('Protocolo')) ? 'active' : ''}}">P.d.M</a>                 
                    <a href="{{route('nosotros')}}" class="{{(request()->routeIs('nosotros')) ? 'active' : ''}}">Nosotros</a>
                    <a href="{{route('contactanos')}}" class="{{(request()->routeIs('contactanos')) ? 'active' : ''}}">Contactanos</a>
        
            </ul>
       <br>
 </header>

  
 
  
