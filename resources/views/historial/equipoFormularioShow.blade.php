{{-- @extends('layouts.plantilla') --}}
@extends('adminlte::page') 
@section('title', 'Ver ' . $equipo->marca)
@section('content_header')

  
  <style>
  
  /** Definir las reglas del encabezado **/
  header {
    background-color: transparent; 
  position: fixed;
  top: 0cm;
  left: 0cm;
  right: 0cm;
  height: 4cm;
  
  /** Estilos extra personales **/
  background-color: transparent;
  color: black;
  text-align: center;
  line-height: .5cm;
  }
  
  /** Definir las reglas del pie de página **/
  footer {
  background-color: transparent;  
  position: fixed;
  bottom: 0.5cm;
  left: 0cm;
  right: 0cm;
  height: 2.5cm;
  
  /** Estilos extra personales **/
  background-color:white;
  color: black;
  text-align: center;
  line-height: 0.5cm;
  }
  
  </style>
 
  @include('layouts.partials.menuEquipo')
@stop
@section('css')
{{-- https://datatables.net/ **IMPORTANTE PLUG IN PARA LAS TABLAS --}}
{{-- Para que sea responsive se agraga la tercer libreria --}}
{{-- Todo lo de plantilla --}}
{{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> --}}

<style>
 
 
    .table-bordered {
      border: 1px solid #ddd;
      width: 95%;
      margin:2% 
    }
    
    #rotulo {
      border: none;
      width: 100%;
      padding: 5px;
      margin:2% 
    }
    .table-bordered th , #tcheck {
      text-align: center;
      padding: 8px;
    }
    

    .left-align {
      text-align: left; /* Justifica el contenido a la izquierda */
      padding-left: 10px; /* Ajusta el tamaño del padding izquierdo según tus preferencias */
    }
    .right-align {
      text-align: right; /* Justifica el contenido a la izquierda */
      padding-right: 5px; /* Ajusta el tamaño del padding izquierdo según tus preferencias */
    }
 
  .select-custom {
  background-color: #9d9074a3;
}
#boton {
  padding-top: 10px;
}

</style>
@endsection

@section('content')
<div class="container">
 <!-- Defina bloques de encabezado y pie de página antes de su contenido -->

<TABLE BORDER=3  WIDTH="100%" CELLPADDING=1 CELLSPACING=0  >
	<TR ALIGN=center >

    <TD ROWSPAN=3 Width=20% valign= middle> <img src="../../storage/LogoIngenio2.png"   height="100px" width="130px"/></TD>
        <TD ROWSPAN=3 Width=60%><h1>PLAN-{{$equipo->codEquipo}}</h1><h2>F-{{$formulario->id}}</h2></TD>
	    <TD>GFPO17.V01</TD>
      
	</TR>
	<TR>
        <TD>Revisión:</TD>
    </TR>
    <TR>
        <TD></TD> <!-- Aqui Nº de pagina  -->
    </TR>
    
    

</TABLE> 

<body>
  <div id="boton">
  <a class="btn btn-success" href="{{ route('imprimirFormulario', $formulario->id) }}">
    <i class="bi bi-printer"></i> Formulario
  </a>
</div>









<!-- Envuelva el contenido de su PDF dentro de una etiqueta principal -->
<main>
 
  @if(isset($PlanP))
    @foreach($PlanP as $plan)
    <table class="table-bordered">
      <tr>
      <ul style="list-style-type: none; margin-left: -37px;">
        <li style="font-size: 150%; text-align: center"><strong><u>{{ $equipo->marca }}&nbsp;{{ $equipo->modelo }}</u></strong></li><br><br>
        <li style="font-size: 110%;"><strong>Aplicar en:</strong>&nbsp;{{ $plan['nombre'] }}</li>
        <li style="font-size: 110%;"><strong>Clasificación del plan:</strong>&nbsp;{{ $plan['descripcion'] }}</li>
      </ul> 
      </tr>
      <br>
    </table>
      @if(isset($ProtocoloP))
      
        @foreach($ProtocoloP as $protocolo)
          <div class="col-12" align="left"><strong>{{ $protocolo['descripcion'] }}</strong></div> 
          <div style="padding-top: 1%;" class="row align-items-end">
           
           
            <table class="table">
              @foreach($Tareas as $tarea) 
                @if($tarea['tcheck'] !== null && $protocolo['codProto'] == $tarea['cod'])
                  <tr>
                    <td width="5%" id="tcheck">{{ $tarea['tcheck'] }}</td> 
                    <td class="left-align">{{ $tarea['descripcion'] }}</td>
                  </tr>
                @endif 
              @endforeach  
            </table>
           
            <div>&nbsp;</div>
          </div>
        @endforeach 
    
      @endif
    @endforeach
  @endif 
 
  <table id="rotulo">
    <tr>
      <td colspan="2">
        @if($formulario->pendiente)
          Tarea pendiente: {{$formulario->pendiente}}
        @else
          <span class="text-success">No existe tarea pendiente</span>
        @endif
      </td>
    </tr>
    <tr>
      <td colspan="2">
        @if($formulario->observacion)
          Observación: {{$formulario->observacion}}
        @else
          <span class="text-success">No existe tarea observación</span>
        @endif
      </td>
    </tr>



    <tr>
      @if($formulario->correccion !== null)
        <td colspan="2">Corrección realizada: {{$formulario->correccion}} en la fecha {{ $formulario->created_at->format('d-m-Y') }}</td>
      @endif
    </tr>
    
    <tr>
      <td>Realizado por: {{$formulario->tecnico}}</td>
      <td>Supervisado por: {{$formulario->supervisor1}}</td>
      
    </tr>
  </table>
  <div class="container mt-4">
  <p class="mb-1"><strong>R:</strong> <span class="text-success">Realizado</span></p>
  <p class="mb-1"><strong>OP:</strong> <span class="text-success">Operativo</span></p>
  <p class="mb-1"><strong>INC:</strong> <span class="text-warning">Incompleto</span></p>
  <p class="mb-0"><strong>NR:</strong> <span class="text-danger">No realizado</span></p>
</div>


  
</main>





  
</body>





        
 <!-- Copyright © <?php echo date("Y");?> -->
<br><br>
<TABLE BORDER=3  WIDTH="100%" CELLPADDING=1 CELLSPACING=0 >
	<TR  ALIGN=center>

    <TD Width=25% valign= middle> Revisión</TD>
    <TD Width=25% valign= middle> Elaboración</TD>
    <TD Width=50% colspan="2" valign= middle> Aprobaciones</TD>  
    
	</TR>
	<TR>
        <TD valign= top ><br></TD>
        <TD style="text-align: center"  >Equipo de calidad</TD>
        <TD height="55px" valign= top >&nbsp; Area origen:<br></TD>
        <TD valign= top >&nbsp; Area usuaria:</TD>
    </TR>
    
    

</TABLE>       

</div> {{-- Container --}}

@endsection




