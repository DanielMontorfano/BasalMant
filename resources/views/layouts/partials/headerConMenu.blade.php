<header>

  <div class="table-responsive">
    <table class="table">
      <TR>
        <TD>
          <nav>
            <ul><h4 style="color:Tomato;">BasalMant</h4>
                {{-- en la siguiente linea utilizo ? como if, y : como else --}}
              <a href="{{route('home')}}" class="{{(request()->routeIs('home')) ? 'active' : ''}}">Home</a>
                  {{-- @dump(request()->routeIs('home')) para recordar de donde viene --}}
                    
              
                {{-- en la siguiente linea el * es para que aplique  clase a toda dir que empieza con equipos --}}
              <a href="{{route('equipos.index')}}" class="{{(request()->routeIs('equipos.*')) ? 'active' : ''}}">Equipos</a>
                    {{-- @dump(request()->routeIs('equipos.index')) --}}
                    
                
                                
                <a href="{{route('nosotros')}}" class="{{(request()->routeIs('nosotros')) ? 'active' : ''}}">Nosotros</a>
                
                    <a href="{{route('contactanos')}}" class="{{(request()->routeIs('contactanos')) ? 'active' : ''}}">Contactanos</a>
                
            </ul>
        </nav>
        
        
        
        </TD>
     
        
        <TD> @if (Route::has('login'))
          <div class="hidden fixed top-0 right-0 px-6 py-1 sm:block">
              @auth
                  <a href="{{ url('/equipos') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a>
              @else
                  <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>
        
                  @if (Route::has('register'))
                      <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                  @endif
              @endauth
          </div>
        @endif
      </TD>
      </TR>
    
     
    </table>
  </div>
  
    <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-0 sm:pt-0">
      <div class="row">
        <div class="col-12 ">
          <div class="card " STYLE="color: #FFFFFF; font-family: Verdana; font-weight: bold; font-size: 12px; background-color: #0a0a09;" >             
            <div class="card-header">
               <ul class="nav nav-tabs card-header-tabs">
               <li class="nav-item">
                 <a class="nav-link" aria-current="true" href="{{route('equipos.show', $equipo->id)}}">Ficha</a>
               </li>
               <li class="nav-item">
               </li>
               <li class="nav-item">
                 <a class="nav-link active" href="{{route('fotos.show', $equipo->id)}}">Fotos</a>
               </li>
         
               <li class="nav-item">
                 <a class="nav-link" href="{{route('equipos.index')}}">Historial</a>
               </li>
               <li class="nav-item">
                 <a class="nav-link" href="{{route('equipos.index')}}">Protocolo</a>
               </li>
               <li class="nav-item">
                 <a class="nav-link" href="{{route('equipos.index')}}">Plan</a>
               
               <li class="nav-item">
                 <a class="nav-link" href="{{route('equipos.index')}}">Documentos</a>
               </li>
               <li class="nav-item">
                 <a class="nav-link" href="{{route('equipos.index')}}">Descargar</a>
               </li>
               <li class="nav-item">
                 <a class="nav-link" href="{{route('equipos.index')}}">Imprimir</a>
               </li>
               <li class="nav-item">
                 <a class="nav-link" href={{route('equipos.edit', $equipo->id)}}>Editar</a>
               </li>
             </ul>
            
           </div>
           </div>
        </div>  
      </div>
    </div>

</header>

  
 
  
