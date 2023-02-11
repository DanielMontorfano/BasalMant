@extends('adminlte::page') 

@section('title', 'Ver')
@section('content_header')
@include('layouts.partials.menuPlanes')
@stop
@section('css')

@endsection

@section('content')


  <section class="main row ">
 
    <div class="container ">
      
     
              
               <br>
              
              {{-- Probando Col --}}
              <div class="container">
                <h6 STYLE="text-align:center; font-size: 30px;
                      background: -webkit-linear-gradient(rgb(1, 103, 71), rgb(239, 236, 217));
                      -webkit-background-clip: text;
                      -webkit-text-fill-color: transparent;">Ficha de plan</h6>
                      <br> 

                <div class="row">
                  <div class="col col-md-2">
                    {{-- Columna 1 --}}
                    
                  </div>
                  <div class="col col-md-8">
                    {{-- Columna2 --}}
                    <form id="encabezado" action="{{route('protocolos.update', $plan->id)}}" method="POST" class="form-horizontal" STYLE="background: linear-gradient(to right,#495c5c,#030007);">
                      
                      @csrf  {{-- Envía un token de seguridad. Siempre se debe poner!!! sino no funca --}}
                      @method('put') {{-- Metodo PUT no existe en html, por eso indicamos a laravel como sigue --}}
                      
                      <div class="p-3 mb-2  text-white">
                      <div class="container">
                          <div class="row">
                            <div class="col col-md-3">
                              <div class="form-group">
                                <label class="control-label" for="codigo">Código:</label> 
                                <input readonly autocomplete="off" class="form-control" STYLE="color: #f2baa2; font-family: Times New Roman;  font-size: 18px; background: linear-gradient(to right,#030007, #495c5c);"  type="text" name="marca" value="{{old('codigo', $plan->codigo)}}"> 
                                @error('codigo')
                                <small>*{{$message}}</small>
                                @enderror
                              </div>
                              
                            </div>
                            <div class="col col-md-5">
                              <div class="form-group">
                                <label class="control-label" for="nombre">Nombre:</label> 
                                <input readonly autocomplete="off" class="form-control" STYLE="color: #f2baa2; font-family: Times New Roman;  font-size: 18px; background: linear-gradient(to right,#030007, #495c5c);" type="text" name="nombre" value="{{old('nombre', $plan->nombre)}}" placeholder="nombre"> {{-- old() mantiene en campo con el dato--}}
                                 @error('nombre')
                               <small>*{{$message}}</small>
                                @enderror
                              </div>
                            </div>
                            
                           
                            <div class="col col-md-2">
                              <div class="form-group">
                                <label class="control-label" for="frcuencia">Frecuencia:</label> 
                                <input readonly autocomplete="off" class="form-control" STYLE="color: #f2baa2; font-family: Times New Roman;  font-size: 18px; background: linear-gradient(to right,#030007, #495c5c);" type="text" name="frecuencia" value="{{old('frecuencia', $plan->frecuencia)}}" placeholder="Frecuencia"> {{-- old() mantiene en campo con el dato--}}
                                @error('frecuencia')
                               <small>*{{$message}}</small>
                                @enderror
                              </div>
                            </div> 
                            <div class="col col-md-2">
                              <div class="form-group">
                                <label class="control-label" for="unidad">Unidad:</label> 
                                <input readonly autocomplete="off" class="form-control" STYLE="color: #f2baa2; font-family: Times New Roman;  font-size: 18px; background: linear-gradient(to right,#030007, #495c5c);" type="text" name="unidad" value="{{old('unidad', $plan->unidad)}}" placeholder="Unidad"> {{-- old() mantiene en campo con el dato--}}
                                @error('unidad')
                                <small>*{{$message}}</small>
                                @enderror
                              </div>
                             
                             </div>

                            </div> {{-- cierra row 1--}}
                             <div class="col col-md-12">
                              <div class="form-group">
                                <label class="control-label " for="descripcion">Descripción:</label>
                                <input readonly autocomplete="off" class="form-control" STYLE="color: #f2baa2; font-family: Times New Roman;  font-size: 18px; background: linear-gradient(to right,#030007, #495c5c);" type="text" name="descripcion" value="{{old('descripcion', $plan->descripcion)}}" placeholder="Descripcion"> {{-- old() mantiene en campo con el dato--}}
                                @error('descripcion') {{--el 2do parametro de old es para mantener la mificacion cuando la validacion falla--}}
                                <small class="help-block">*{{$message}}</small>
                                @enderror
                             </div>
                             
                        
                              
                      </form >  {{-- Cierra Formulario Nº1 --}} 
                      <br>
                      {{--INICIO DE SEGUNDO FORMULARIO --}}
                      <div class="card " STYLE="background: linear-gradient(to right,#495c5c,#030007);">
                        <div class="card-header " STYLE="background: linear-gradient(to right,#495c5c,#030007);">            
                                     {{-- MUESTRA PROTOCOLOS --}} 
                              <table class="table" STYLE="background: linear-gradient(to right,#495c5c,#030007);">
                                     <thead>
                                        <tr>
                                          <th style="text-align: center; color: #ffffff;" scope="col">Código</th>
                                          <th style="text-align: center; color: #ffffff;" scope="col">Descripción</th>
                                          
                                          
                                        </tr>
                                      </thead>
                                      @if(isset($ProtocoloP))
                                      @foreach($ProtocoloP as $protocolo)
                                        <form action="{{route('planproto.store')}}" method="POST">
                                          @csrf
                                           
                                            <tbody>
                                                  <tr>
                                                    <th title="Editar este protocolo" STYLE="color: #bcc7e0; font-family: Times New Roman;  font-size: 14px; "scope="row">{{$protocolo['codProto']}} <a href=""></a> </th>
                                                    <td STYLE="color: #bcc7e0; font-family: Times New Roman;  font-size: 14px; ">{{$protocolo['descripcion']}}</td>
                                                  </tr>
                                                  @foreach($Tareas as $tarea) 
                                                  @if($protocolo['codProto'] ==$tarea['cod'])
                                                  <tr>
                                                  <th STYLE="color: #ffffff; font-family: Times New Roman;  font-size: 14px; "scope="row">{{$tarea['codigoTar']}}</th>
                                                  <td STYLE="color: #ffffff; font-family: Times New Roman;  font-size: 14px; ">{{$tarea['descripcion']}}</td>
                                                  </tr>
                                                  @endif
                                                  @endforeach
                                            </tbody>
                                        </form>
                                        @endforeach
                                        @endif
                              </table>
                          </div> {{-- div del card3 --}}
                          </div> {{-- div del card4 --}}
                          <br>
                       
                  <div class="col col-md-2">
                    {{-- Columna --}}
                  </div>
                   <p style="text-align: right;"><a  class="text-white " href={{route('plans.index')}}>Salir</a></p>
                   
                  </div>
              </div>
    
    
              
            <br>
                       
            
    
                <br>
                   <div class="form-group">
                    {{--   <button form="encabezado" class="btn btn-primary" type="submit" STYLE="background: linear-gradient(to right,#495c5c,#030007);">Enviar</button> --}}
                    
              
                   <br>   
                  </div>             
    </section>



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

{{-- <h3>Estoy en equipos.show.blade </h3> --}}
 

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




