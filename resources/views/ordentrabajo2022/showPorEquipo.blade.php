@extends('layouts.plantilla')
@section('title', 'Ver ' . $equipo->marca)
@section('content')


<style>
  .deg {
      background: linear-gradient(#000046, #1cb5e0);
      color:rgb(46, 46, 90);
  }
  
 </style>
{{-- ESTO ES UN COMENTARIO <h1>Aqui podras ver el equipo: <?php echo $variable;?></h1> --}}
{{-- <h1>Aqui podras ver el equipo: {{ $variable}}</h1> --}}
<div class="card " STYLE="color: #FFFFFF; font-family: Verdana; font-weight: bold; font-size: 12px; background-color: #72A4D2;" >
  <div class="card-header">
    <ul class="nav nav-tabs card-header-tabs">
      <li class="nav-item">
        <a class="nav-link active" aria-current="true" href="{{route('equipos.show', $equipo->id)}}">Ficha</a>
      </li>
      <li class="nav-item">
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('fotos.show', $equipo->id)}}">Fotos</a>
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
        <a class="nav-link" href={{route('equipos.edit', $equipo->id)}}>Editar</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href={{route('ordentrabajo.show', $equipo->id)}}>OT</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('equipos.index')}}">Descargar</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('equipos.index')}}">Imprimir</a>
      </li>
      

    </ul>
  </div>
  <div class="card-body">
    <h5 class="card-title">Datos técnicos</h5>
    <p class="card-text"></p>
    <div class="card border-primary " style="background: linear-gradient(#0c0c0c, #4b5052);">
    <div class="card-body "  style="max-width: 85;">
     <h3>Orden abierta: {{$consulta->id}}  AQUI ESTAMOS VIENDO</h3> 
    
     <div class="container">
      <div class="row">
        <div class="col">
          Column 1
         
          <div class="card border-primary" style="background: linear-gradient(to right,#000046, #1cb5e0);">
            <div class="card-body "  style="max-width: 85;">
          <form action="{{route('ordentrabajo.store')}}" method="POST">
            {{-- Envía un token de seguridad. Siempre se debe poner!!! sino no funca --}}
            @csrf
            @if ($estado == 'si')
               <fieldset disabled>
            @endif
            <br>
            <br>
            <div class="form-group">
            <label class="sr-only" for="equipo">Sobre el equipo:</label> 
            
            </div>
             <br>
             <div class="form-group">
           <label class="sr-only" for="codEquipo">De:</label> 
           <input class="form-control" type="text" name="de" value={{old('de')}}> {{-- old() mantiene en campo con el dato--}}
           @error('de')                                          {{--el 2do parametro de old es para mantener la mificacion cuando la validacion falla--}}
           <small class="help-block">*{{$message}}</small>
           @enderror
           </div>
           <br>
           <div class="form-group">
           <label class="sr-only" for="para"> Para:</label> 
           <input class="form-control" type="text" name="para" value={{old('para')}}> 
           @error('para')
           <small>*{{$message}}</small>
           @enderror
           </div>
           <br>
            
           <div class="form-group">
           <label class="sr-only" for="det1">Detalle:</label> 
            {{-- <input class="form-control" type="text" name="det1" value={{old('det1')}}>  --}}
           <textarea class="form-control" name="det1" id="exampleFormControlTextarea1" rows="4"></textarea> 
          
           @error('det1')
           <small>*{{$message}}</small>
           @enderror
           </div>
           <br>
           <br>
       
           <div class="form-group">
           {{-- <label class="float-left" for="estado">Estado:</label> --}}
             
           {{--<input class="form-control" type="text" name="estado" value={{old('estado')}}>  --}}
           <input class="form-control" type="hidden" name="estado" value="Abierto" style="font-size: 14px; width:100px; height: 30px" readonly> 
           @error('estado')
           <small>*{{$message}}</small>
           @enderror
           </div>
                     
           <div class="form-group ">
           <label class="sr-only" for="per_abre"> Firma:</label> 
           <input class="col-xs-2"  type="text" name="per_abre" value={{old('per_abre')}}> 
           @error('per_abre')
           <small>*{{$message}}</small>
           @enderror
           </div>
           <br>
            <br>
            <br>
           <div class="form-group" >
           <div class="mx-auto" style="width: 150px;">
           <button type="submit" class="btn btn-default" >Abrir Orden</button>
           </div>
        </div>   
        
        @if ($estado == 'si')
          </fieldset>
        @endif 
       </form>
      </div> 
      </div> 




        </div>
        <div class="col">
          Column 2
          <div class="card border-primary" style="background: linear-gradient(to left,#000046, #1cb5e0);">
            <div class="card-body "  style="max-width: 85;">
          
          <form action="{{route('ordentrabajo.store')}}" method="POST"  disabled >
            @if ($estado == 'no')
            <fieldset disabled>
            
            @endif 
            {{-- Envía un token de seguridad. Siempre se debe poner!!! sino no funca --}}
            @csrf
            <br>
            <br>
            <div class="form-group">
            <label class="sr-only" for="equipo">Sobre el equipo:</label> 
            
            </div>
             <br>
             <div class="form-group">
           <label class="sr-only" for="codEquipo">De:</label> 
           <input class="form-control" type="text" name="de" value={{old('de')}}> {{-- old() mantiene en campo con el dato--}}
           @error('de')                                          {{--el 2do parametro de old es para mantener la mificacion cuando la validacion falla--}}
           <small class="help-block">*{{$message}}</small>
           @enderror
           </div>
           <br>
           <div class="form-group">
           <label class="sr-only" for="para"> Para:</label> 
           <input class="form-control" type="text" name="para" value={{old('para')}}> 
           @error('para')
           <small>*{{$message}}</small>
           @enderror
           </div>
           <br>
            
           <div class="form-group">
           <label class="sr-only" for="det1">Detalle:</label> 
            {{-- <input class="form-control" type="text" name="det1" value={{old('det1')}}>  --}}
           <textarea class="form-control" name="det1" id="exampleFormControlTextarea1" rows="4"></textarea> 
          
           @error('det1')
           <small>*{{$message}}</small>
           @enderror
           </div>
           <br>
           <br>
       
           <div class="form-group">
           {{-- <label class="float-left" for="estado">Estado:</label> --}}
             
           {{--<input class="form-control" type="text" name="estado" value={{old('estado')}}>  --}}
           <input class="form-control" type="hidden" name="estado" value="abierta" style="font-size: 14px; width:100px; height: 30px" readonly> 
           @error('estado')
           <small>*{{$message}}</small>
           @enderror
           </div>
                     
           <div class="form-group ">
           <label class="sr-only" for="per_abre"> Firma:</label> 
           <input class="col-xs-2"  type="text" name="per_abre" value={{old('per_abre')}}> 
           @error('per_abre')
           <small>*{{$message}}</small>
           @enderror
           </div>
           <br>
            <br>
            <br>
           <div class="form-group" >
           <div class="mx-auto" style="width: 150px;">
           <button type="submit" class="btn btn-default" >Abrir Orden</button>
           </div>
        </div> 
        
      @if ($estado == 'no')
        </fieldset>
          @endif 
    </form>
      </div> 
      </div> 
          
      </div>
      </div>
    </div> 
       
        
          
          
        
      
   
    </div>
    </div>
    
  </div>
</div>




{{-- ************************************************************************************** --}}
{{-- ****LAS SIGUIENTES LINEAS SE COMENTAN POR RAZONES DE SER CODIGO MAESTRO --}}
{{-- <p><strong>Marca:</strong>{{$equipo->marca}}</p>
<p><strong>Modelo:</strong>{{$equipo->modelo}}</p>
<p><strong>Seccion:</strong>{{$equipo->idSecc}}</p>
<p><strong>Subsección:</strong>{{$equipo->idSubSecc}}</p>
<p><strong>Caractrística 1:</strong>{{$equipo->det1}}</p>
<p><strong>Caractrística 2:</strong>{{$equipo->det2}}</p>
<p><strong>Caractrística 3:</strong>{{$equipo->det3}}</p>
<p><strong>Caractrística 4:</strong>{{$equipo->det4}}</p>
<p><strong>Caractrística 5:</strong>{{$equipo->det5}}</p>
<p><strong>Repuestos:</strong></p>
 
<h3>Listado de repuestos</h3>

@foreach($repuestos as $repuesto)
<table>
   <tr>
    
    <td><li>*{{$repuesto->pivot->cant}}* - - {{ $repuesto->codigo }} - {{ $repuesto->descripcion}} </li> </td>
      
  </tr>

</table>
         
@endforeach --}}
{{-- ************************************************************************************** --}}


 <h3>Estoy en equipos.show.blade </h3>


{{-- Para hacer resposive necesito agregar las 2 ultimas librerias --}}
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
<script>src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js"</script>
<script>src="https://cdn.datatables.net/responsive/2.3.0/js/responsive.bootstrap5.min.js"</script>




<script>
    $(document).ready(function () {
    $('#equipo').DataTable({
      
      reponsive: true,
      autoWidth: false,
      
      "language": {
            "lengthMenu": "Mostrar _MENU_",
            "zeroRecords": "No se encontró ningún registro - disculpe",
            "info": "Viendo _PAGE_ de _PAGES_",
            "infoEmpty": "No hay registros disponibles",
            "infoFiltered": "(filtrados desde _MAX_ total registros)",
            "search":"Buscar:",
            "paginate":{
            "next":"Siguiente",
            "previous":"Anterior"
          }

        }
    });
});
</script>
@endsection




