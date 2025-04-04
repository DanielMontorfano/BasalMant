{{-- @extends('layouts.plantilla') --}}
@extends('adminlte::page') 
@section('title', 'Ver ' . $equipo->marca)
@section('content_header')
  @include('layouts.partials.menuEquipo')
@stop
@section('css')
{{-- https://datatables.net/ **IMPORTANTE PLUG IN PARA LAS TABLAS --}}
{{-- Para que sea responsive se agraga la tercer libreria --}}
{{-- Todo lo de plantilla --}}
{{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> --}}

<style>
  .select-custom {
  background-color: #9d9074a3;
}

#table{
  /*border-collapse: collapse;*/

}
#tabla2 {
  
  margin-top: 2px; /* ajusta el valor según sea necesario */
  margin-bottom: 20px; /* ajusta el valor según sea necesario */
  margin-left: 15px;

  }
#tabla2  tr, td, input {
  
  padding-left: 10px;
  padding-right: 10px;
  padding-top: 5px;
  padding-bottom: 5px;
  padding-bottom: 3px; /* Añade un poco de espacio entre cada elemento y la línea */
  padding-top: 20
}

</style>
@endsection

@section('content')
<div class="container">
  

<div class="card" STYLE="background: linear-gradient(to right,#5c5649,#030007);" >
  <div class="card-header" STYLE="background: linear-gradient(to right,#201f1e,#030007);" >
    
  
  
    <h6 STYLE="text-align:center; font-size: 30px;
                background: -webkit-linear-gradient(rgb(1, 103, 71), rgb(239, 236, 217));
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;">Ficha plan</h6>
                



        {{-- <p ><a  class="text-white " href={{route('equipoTareash.show', $equipo->id)}}>editar tareas de este equipo</a></p> --}}
        
        <form id="cargaPlan" action="{{route('equipoTareash.store')}}" method="POST" class="form-horizontal" STYLE="background: linear-gradient(to right,#141E30,#243B55);">
          @csrf
        @if(isset($PlanP))
        <?php $contadorPlan = 0; ?>
        @foreach($PlanP as $plan)
        <?php $contadorPlan++; ?>
        <table class="table-bordered">
          <tr >
            <td class="col-2" title="Editar este plan">
              <strong>
                <a href="{{route('plans.edit', $plan->id)}}">{{$plan->codigo}}</a>

              </strong><br>
              
              {{$plan->descripcion}}

            </td>

              <td  align="center" >
                    <table class="tabla2">
                      @foreach($ProtocoloP as $protocolo)
                          <tr>
                            <td colspan="3"  style="padding-left: 100px;">
                             
                              <div  title="Editar este procedimiento">
                                      <strong>
                                        <a href="{{route('protocolos.edit', $protocolo->id)}}">{{$protocolo->codProto}}</a>
                                      </strong>
                                ( {{$protocolo->descripcion}} )
                              </div>
                              
                            </td>
                          </tr>
                          <?php $contador = 1; ?>
                          @foreach($Tareas as $tarea)
                          
                          @if($protocolo->codProto ==$tarea->cod)
                            <tr>
                              <td>
                                <input type="hidden" name="equipo_id[]" value="{{$equipo->id}}" readonly > 
                                <input type="hidden" name="plans[]" value="{{$plan->codigo}}" readonly > 
                                <input type="hidden" name="protocolos[]" value="{{$protocolo->codProto}}" readonly >  
                                <input type="hidden" name="tareas[]" value="{{$tarea->tarea_id}}" readonly > 
                                <select name="estados[]" id="estado" class="form-select select-custom rounded border-radius-3 border border-dark">
                                  <option value="R">R</option> {{-- 2024 para simplificar --}}
                                  <option value="NR">NR</option>
                                  <option value="INC">INC</option>
                                  <option value="OP">OP</option>
                                </select>
                              </td>
                              <td>{{ str_pad($contador, 2, '0', STR_PAD_LEFT) }}. &nbsp; &nbsp;{{$tarea->descripcion}}  </td>
                              <td>{{$tarea->duracion}} {{$tarea->unidad}}</td>
                            </tr>
                            <?php $contador++; ?>
                            @endif 
                            @endforeach 
                             
                            
                          @endforeach 
                         
                              {{-- Inicio  tabla de pie de plan --}} 
                                   <div>
                                    <h4>  <span style="float: right;">{{ now()->format('d/m/Y') }}</span></h4>
                                    <h3>
                                      Nuevo formulario: {{$plan->codigo}} 
                                    
                                    </h3>
                                    <h5>
                                      Frecuencia: {{$plan->frecuencia}} 
                                      @if($plan->frecuencia == 1 && $plan->unidad == 'Años')
                                          Año
                                      @else
                                          {{$plan->unidad}}
                                      @endif
                                  </h5>
                                  
                                  

                                    <table class="table mi-tabla table-borderless">
                                    
                                      <tr>
                                        <td colspan="3">
                                          <input id="pendiente" placeholder="Tarea pendiente" autocomplete="off" class="form-control"  STYLE="color: #f2baa2; font-family: Times New Roman;  font-size: 18px; background: linear-gradient(to right,#243B55,#141E30);"type="text" name="pendiente[]" value={{old('pendiente')}}>
                                        </td>
                                     </tr>
                                     <tr>
                                      <td colspan="3">
                                        <input id="observacion" placeholder="Observación" autocomplete="off" class="form-control"  STYLE="color: #f2baa2; font-family: Times New Roman;  font-size: 18px; background: linear-gradient(to right,#243B55,#141E30);"type="text" name="observacion[]" value={{old('observacion')}}>
                                      </td>
                                     </tr>
                                     
                                    <tr>
                                      <td>
                                       <div class="form-group">
                                              <label class="control-label" for="tecnico"></label> 
                                              <input placeholder="Técnico que realizó" autocomplete="off" class="form-control" STYLE="color: #f2baa2; font-family: Times New Roman;  font-size: 18px; background: linear-gradient(to right,#243B55,#141E30);"  type="text" name="tecnico[]" value={{old('tecnico')}}> 
                                              @error('tecnico')
                                             <small>*{{$message}}</small>
                                              @enderror
                                        </div>
                                      </td>
                                      <td>
                                        <div class="form-group">
                                            <label class="control-label" for="supervisor1"></label>
                                            
                                            <!-- Campo select para elegir un supervisor -->
                                            <select 
                                                class="form-control" 
                                                style="background-color: #1b1b1b !important; color: #f2baa2; font-family: Times New Roman; font-size: 18px; border: 1px solid #f2baa2; border-radius: 4px; width: 100%; height: 38px;" 
                                                name="supervisor1[]">
                                                <option value="">Supervisor</option>

                                                <!-- Iterar sobre los usuarios y crear opciones para el select -->
                                                @foreach($usuarios as $usuario)
                                                    <option value="{{ $usuario->id }}" {{ old('supervisor1') == $usuario->id ? 'selected' : '' }}>
                                                        {{ $usuario->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            
                                            @error('supervisor1')
                                                <small style="color: red;">*{{$message}}</small>
                                            @enderror
                                        </div>
                                    </td>
                                     <td style="padding-top: 50px;">
                                      <div class="form-group">
                                          <label class="control-label" for="ejecucion"></label> 
                                          <select name="ejecucion[]" id="ejecucion" class="form-select select-custom rounded border-radius-3 border border-dark">
                                              <option value="E">Ejecutado</option>
                                              <option value="P">Pendiente</option>
                                          </select>
                                      </div>
                                     </td>



                                    </tr>
                                    <tr>
                                      <tr>
                                        <td colspan="3" style="text-align: center;">
                                          <div class="form-group">
                                            <input type="hidden" name="planId[]" value="{{$plan->id}}">
                                            <input type="hidden" name="equipoId[]" value="{{$equipo->id}}">
                                            <input type="hidden" name="contadorPlan" value="{{$contadorPlan}}">
                                            <button form="cargaPlan" class="btn btn-submit" style="background: linear-gradient(to right,#243B55,#a1a7b0);" type="submit">Enviar</button>
                                          </div> 
                                        </td>
                                      </tr>
                                   </tr>
                                </table>
                                </div>
                              {{-- Fin  tabla de pie de plan --}}      
                    </table>
              </td>
          </tr>
       </table>
      @endforeach
      @endif

   
               
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
 




</div>
</div>
</form>
@section('js')
<script>
document.getElementById('cargaPlan').addEventListener('submit', function(event) {
    const tecnicos = document.querySelectorAll('input[name="tecnico[]"]');
    const supervisores = document.querySelectorAll('select[name="supervisor1[]"]');

    let hasValidPair = false;

    // Verifica cada par de técnico y supervisor
    for (let i = 0; i < tecnicos.length; i++) {
        if (tecnicos[i].value.trim() !== '' && supervisores[i].value !== '') {
            hasValidPair = true; // Hay al menos un par completo
            break; // Sale del bucle si se encuentra un par válido
        }
    }

    // Si no se encuentra un par válido, muestra un mensaje y evita el envío
    if (!hasValidPair) {
        alert("Debe completar al menos un par de 'Técnico que realizó' y 'Supervisor'.");
        event.preventDefault();
    }
});
</script>
@endsection

</div> {{-- Container --}}
<div class="container"> 
  @include('layouts.partials.footer')
</div>
@endsection





