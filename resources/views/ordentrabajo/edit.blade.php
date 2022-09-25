@extends('layouts.plantilla')
@section('title', 'Ver ' . $equipo->marca)
@section('content')


            <div class="card" STYLE="background: linear-gradient(to right,#495c5c,#030007);" >
                <div class="card-header" STYLE="background: linear-gradient(to right,#1e2020,#030007);">
                  <ul class="nav nav-tabs card-header-tabs">
                    <li class="nav-item">
                      <a class="nav-link" href="{{route('equipos.show', $equipo->id)}}">Ficha</a>
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
                      <a class="nav-link"   href={{route('equipos.edit', $equipo->id)}}>Editar</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link active" style="background-color: #1e2020;" aria-current="true" href={{route('ordentrabajo.list', $equipo->id)}}>OT</a>
                    </li>
                    
                    <li class="nav-item">
                      <a class="nav-link" href="{{route('equipos.index')}}">Descargar</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="{{route('equipos.index')}}">Imprimir</a>
                    </li>
                  </ul>
                </div>

                <div class="card-body "  style="max-width: 95;">
                <div class="text-white card-body "  style="max-width: 95;">  
                        
                          <h6 STYLE="text-align:center; font-size: 30px;
                        background: -webkit-linear-gradient(rgb(1, 103, 71), rgb(239, 236, 217));
                        -webkit-background-clip: text;
                        -webkit-text-fill-color: transparent;">Cerrar la orden Nº {{$ot->id}}</h6>

                          
                          <h3></h3> 
                          
                          <div class="container">
                            <div class="row">
                                <div class="col">
                                
                                        
                                                  <div class="card border-primary" style="background: linear-gradient(to right,#495c5c,#030007);">
                                                    <div class="card-body "  style="max-width: 85;">
                                                    <form action="{{route('ordentrabajo.store')}}" method="POST">
                                                    {{-- Envía un token de seguridad. Siempre se debe poner!!! sino no funca --}}
                                                    @csrf
                                                    <br>
                                                    <br>
                                                    
                                                    <div class="form-group">
                                                      <h6>  {{$equipo->modelo}}</h6> 
                                                      <h6>Orden Nº:{{$ot->id}}</h6>
                                                    
                                                    </div>
                                                    <br>
                                                    <div class="form-group">
                                                  <label class="sr-only" for="codEquipo">De:</label> 
                                                  <input class="form-control" type="text" name="de" value={{old('de', $ot->de)}} disabled> {{-- old() mantiene en campo con el dato--}}
                                                  @error('de')                                          {{--el 2do parametro de old es para mantener la mificacion cuando la validacion falla--}}
                                                  <small class="help-block">*{{$message}}</small>
                                                  @enderror
                                                  </div>
                                                  <br>
                                                  <div class="form-group">
                                                  <label class="sr-only" for="para"> Para:</label> 
                                                  <input class="form-control" type="text" name="para" value={{old('para', $ot->para)}} disabled> 
                                                  

                                                  @error('para')
                                                  <small>*{{$message}}</small>
                                                  @enderror
                                                  </div>
                                                  <br>
                                                    
                                                  <div class="form-group">
                                                  <label class="sr-only" for="det1">Detalle:</label> 
                                                    {{-- <input class="form-control" type="text" name="det1" value={{old('det1')}}>  --}}
                                                  <textarea class="form-control" name="det1" id="exampleFormControlTextarea1" rows="4" disabled>{{$ot->det1}}</textarea> 
                                                  
                                                  @error('det1')
                                                  <small>*{{$message}}</small>
                                                  @enderror
                                                  </div>
                                                  <br>
                                                 
                                              
                                                  <div class="form-group">
                                                  {{-- <label class="float-left" for="estado">Estado:</label> --}}
                                                    
                                                  {{--<input class="form-control" type="text" name="estado" value={{old('estado')}}>  --}}
                                                  <input class="form-control" type="hidden" name="estado" value="Abierta" style="font-size: 14px; width:100px; height: 30px" readonly> 
                                                  
                                                  @error('estado')
                                                  <small>*{{$message}}</small>
                                                  @enderror
                                                  </div>
                                                            
                                                  <div class="form-group ">
                                                  <label class="sr-only" for="per_abre"> Firma:</label> 
                                                  <input class="col-xs-2"  type="text" name="per_abre" value={{old('per_abre', $ot->per_abre)}} disabled> 
                                                  @error('per_abre')
                                                  <small>*{{$message}}</small>
                                                  @enderror
                                                  </div>
                                                  <br>
                                                    <br>
                                                    <br>
                                                  {{-- <div class="form-group" >
                                                  <div class="mx-auto" style="width: 150px;">
                                                  <button type="submit" class="btn btn-default" >Abrir Orden</button>
                                                  </div>
                                                </div> --}}   
                                                
                                              
                                                      </form>
                                                    </div> 
                                                  </div> 
                              </div>
                              <div class="col">
                               
                              </div>
                              <div class="col">
                             
                                <div class="card border-primary" style="background: linear-gradient(to left,#495c5c,#030007);">
                                  <div class="card-body "  style="max-width: 85;">
                             <form action="{{route('ordentrabajo.update', $ot->id)}}" method="POST">
                             {{-- Envía un token de seguridad. Siempre se debe poner!!! sino no funca --}}
                             @csrf
                             @method('put')
                             <br>
                             <br>
                             
                             <div class="form-group">
                               <h6>  {{$equipo->modelo}}</h6> 
                               <h6>Orden Nº:{{$ot->id}}</h6>
                             
                             </div>
                             <br>
                             <div class="form-group">
                           <label class="sr-only" for="codEquipo">De:</label> 
                           <input class="form-control" type="text" name="de" value={{old('de', $ot->de)}} disabled> {{-- old() mantiene en campo con el dato--}}
                           @error('de')                                          {{--el 2do parametro de old es para mantener la mificacion cuando la validacion falla--}}
                           <small class="help-block">*{{$message}}</small>
                           @enderror
                           </div>
                           <br>
                           <div class="form-group">
                           <label class="sr-only" for="para"> Para:</label> 
                           <input class="form-control" type="text" name="para" value={{old('para', $ot->para)}} disabled> 
                           

                           @error('para')
                           <small>*{{$message}}</small>
                           @enderror
                           </div>
                           <br>
                             
                           <div class="form-group">
                           <label class="sr-only" for="det2">Tareas realizadas:</label> 
                             {{-- <input class="form-control" type="text" name="det1" value={{old('det1')}}>  --}}
                           <textarea class="form-control" name="det1" id="exampleFormControlTextarea2" rows="4">{{$ot->det2}}</textarea> 
                           
                           @error('det2')
                           <small>*{{$message}}</small>
                           @enderror
                           </div>
                           <br>
                           
                       
                           <div class="form-group">
                           {{-- <label class="float-left" for="estado">Estado:</label> --}}
                             
                           {{--<input class="form-control" type="text" name="estado" value={{old('estado')}}>  --}}
                           <input class="form-control" type="hidden" name="estado" value="Cerrado" style="font-size: 14px; width:100px; height: 30px" readonly> 
                           
                           @error('estado')
                           <small>*{{$message}}</small>
                           @enderror
                           </div>
                                     
                           <div class="form-group ">
                           <label class="sr-only" for="per_cierra"> Firma:</label> 
                           <input class="col-xs-2"  type="text" name="per_cierra" value={{old('per_cierra', $ot->per_cierra)}}> 
                           @error('per_abre')
                           <small>*{{$message}}</small>
                           @enderror
                           </div>
                           <br>
                            
                           <div class="form-group" >
                           <div style=" text-align:center">
                           <button type="submit" class="btn btn-primary" STYLE="width: 100px; background: linear-gradient(to right,#495c5c,#030007);"> Cerrar</button>
                           </div>
                         </div>   
                         
                       
                               </form>
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