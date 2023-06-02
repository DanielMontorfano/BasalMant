{{-- @extends('layouts.plantilla') --}}
@extends('adminlte::page') 
@section('title', 'Ver ' . $equipo->marca)
@section('content_header')

@include('layouts.partials.menuEquipo')
@stop
@section('css')
<style>
  /* Estilos de la tabla */
  #listado {
    background: transparent; /*linear-gradient(to bottom right, #111010, #1f1001);*/
    border: 1px solid  rgb(209, 209, 158);
   
    border-color:  rgb(209, 209, 158);
    text-align: center;
    font-family: "serif", Times, serif;
    border-collapse: separate;
    border-spacing: 0;
  }
  #listado td {
    border-color:  rgb(209, 209, 158);
    text-align: left;
    vertical-align: middle;
    border-bottom: 1px solid rgb(111, 213, 9);
    border-top-left-radius: 0px;
    border-bottom-left-radius: 0px;
  }
  #listado td.col-8 {
    padding-left: 50px;
    padding-top: 30px;"
    padding-bottom: 30px;
  }
  #listado td.col-12 {
    border-bottom: 1px solid #FFD966;
    margin-bottom: 10px;
    padding-top: 30px;"
   
  }
  table td:first-child {
    border-top-left-radius: 0px;
    border-bottom-left-radius: 0px;
  }

  table td:last-child {
    border-top-right-radius: 0px;
    border-bottom-right-radius: 0px;
  }
  #listado li {
    list-style: none;
  }

  a {
      color: rgb(197, 166, 11);
    }
    a:hover {
      color: rgba(119, 238, 15, 0.758);
    }  
</style>
@endsection

@section('content')
<div class="container">
  

<div class="card border-primary" style="background: linear-gradient(to left, #495c5c, #030007);">
  <div class="card-body">
    <h6 style="text-align:center; font-size: 30px;
                background: -webkit-linear-gradient(rgb(1, 103, 71), rgb(239, 236, 217));
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;">Plan de mantenimiento: {{ $equipo->codEquipo }}</h6>

    <p class="text-white"><a href="{{ route('equipoTareash.edit', $equipo->id) }}" class="text-white">Cargar ficha plan</a></p>
    <div id="boton">
      <a class="btn btn-success" href={{route('imprimirPlan', $equipo->id)}}>
        <i class="bi bi-printer"></i>  Imprimir plan
      </a>
    </div>
   
    @if (isset($PlanP))
        @foreach ($PlanP as $plan)
            <table id="listado" class="table-bordered">
                <tr>
                    <td class="col-2" style="background-color:trnasparent ; " align="left">
                      <div title="Editar este plan"> <a href="{{ route('plans.edit', $plan['id']) }}"><br> {{ $plan['codigo'] }}</a><br>   {{ $plan['nombre'] }} <br> ({{ $plan['descripcion'] }})</div>
                     
                    
                    </td>
                    <td class="col-8" style="background-color: trnasparent;  " class="text-right">
                      @if (isset($ProtocoloP))
                      @foreach ($ProtocoloP as $protocolo)
                          <div class="col-12"  title="Editar este procedimiento" align="left" >
                            <strong>
                              <a href="{{ route('protocolos.edit', $protocolo['id']) }}">{{ $protocolo['codProto'] }} &nbsp; ({{ $protocolo['descripcion'] }})</a>
                            </strong>  
                           </div>
                          <div class="row align-items-end padding-right: 50px;">
                              <?php $contador = 1; ?>
                              @foreach ($Tareas as $tarea)
                                  @if ($protocolo['codProto'] == $tarea['cod'])
                                      <div class="col-1" align="right">
                                          {{ str_pad($contador, 2, '0', STR_PAD_LEFT) }}.
                                      </div>
                                      <div class="col-5" align="left">
                                          {{ $tarea['descripcion'] }}
                                      </div>
                                      <div class="col-6" align="left">
                                          {{ $tarea['duracion'] }} {{ $tarea['unidad'] }}
                                      </div>
                                      <?php $contador++; ?>
                                  @endif
                              @endforeach
                              <div>&nbsp;</div>
                          </div>
                      @endforeach
                  @endif
                  </td>
                </tr>
            </table>
        @endforeach
    @endif
  </div>
</div>


</div> {{-- container --}}
  <div class="container"> 
    @include('layouts.partials.footer')
  </div>
  
@endsection




