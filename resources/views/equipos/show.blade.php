
@extends('adminlte::page')
{{-- comment --}}
@section('title', $equipo->codEquipo)

@section('content_header')
<script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
@include('layouts.partials.menuEquipo')
@stop

@section('content')
<div class="container">
 

<div class="card border-primary" style="background: linear-gradient(to left,#495c5c,#030007); ">
<div class="card-body "  style="max-width: 95;">

  <header>
<TABLE BORDER=3  WIDTH="100%" CELLPADDING=1 CELLSPACING=0  >
	<TR ALIGN=center >

    <TD ROWSPAN=3 Width=20% valign= middle> <img src="../storage/LogoIngenio2.png"    height="100px" width="130px"/></TD>
        <TD ROWSPAN=3 Width=60%><h1>Ficha técnica de equipo</h1></TD>
	    <TD>GFRE12.V01</TD>
      
	</TR>
	<TR>
        <TD>Vigencia: 09/02/2023</TD>
    </TR>
    <TR>
        <TD>Revisión: 09/02/2023</TD> <!-- Aqui Nº de pagina  -->
    </TR>
    
    

</TABLE>

</header>

<br>
<br>

 
  <Ul style="list-style-type: none; margin-left: -37px;">
    <li style="font-size:150%;"><strong>Código:</strong>&nbsp;  {{$equipo->codEquipo}}</li> 
    <li style="font-size:150%;"><strong>Marca:</strong>&nbsp;  {{$equipo->marca}}</li>
    <li style="font-size:150%;"><strong>Modelo:</strong>&nbsp;  {{$equipo->modelo}}</li>
    <li style="font-size:150%;"><strong>Sección:</strong>&nbsp;  {{$equipo->idSecc}}</li>
    <li style="font-size:150%;"><strong>Subsección:</strong>&nbsp;  {{$equipo->idSubSecc}}</li>
  </Ul>  
    <br>
  <Ul style="margin-left: -25px;">
    <li style="font-size:100%;">&nbsp;  {{$equipo->det1}}</li>
    <li style="font-size:100%;">&nbsp;  {{$equipo->det2}}</li>
    <li style="font-size:100%;">&nbsp;  {{$equipo->det3}}</li>
    <li style="font-size:100%;">&nbsp;  {{$equipo->det4}}</li>
    <li style="font-size:100%;">&nbsp;  {{$equipo->det5}}</li>
  </Ul>  

    <br>
    
  <!-- REPUESTOS -->

    <table>
    <thead>
          <tr>
            <td scope="col" style="text-align: left; font-size:150%;"><u> Repuestos:</u></td>
            <td scope="col" class="text-center; "></td>
            <td scope="col" class="text-center"></td>
          </tr>
        </thead>
        <br>
        <tbody>
        @foreach($repuestos as $repuesto)
        @if(!$repuesto->pivot->check1 =='on') {{-- Para saber si es repuesto o no --}}
        <tr>
          <td scope="row" class="text-left"><b>{{ $repuesto->codigo }}</b></td>
          <td class="text-left">{{ $repuesto->descripcion}} </td>
          <td class="text-rigth">{{$repuesto->pivot->cant}} {{$repuesto->pivot->unidad}} </td>
        </tr>
        @endif
        @endforeach
        </tbody>
        </table>
        <br>

         <!-- ACCESORIOS -->
        <table>
    <thead>
          <tr>
            <td scope="col" style="text-align: left; font-size:150%;"><u>Accesorios:</u></td>
            <td scope="col" class="text-center; "></td>
            <td scope="col" class="text-center"></td>
          </tr>
        </thead>
        <br>
        <tbody>
        @foreach($repuestos as $repuesto)
        @if($repuesto->pivot->check1 =='on') {{-- Para saber si es repuesto o no --}}
        <tr>
          <td scope="row" class="text-left"><b>{{ $repuesto->codigo }}</b></td>
          <td class="text-left">{{ $repuesto->descripcion}} </td>
          <td class="text-rigth">{{$repuesto->pivot->cant}} {{$repuesto->pivot->unidad}} </td>
        </tr>
        @endif
        @endforeach
        </tbody>
        </table>
        <br>

        <!-- PLANES -->

      </table>
        <br>
        <table>
        <thead>
          <tr>
            <td scope="col" style="text-align: rigth; font-size:150%;"><u> Plan:</u>
               <button style="background-color: Transparent;border: none;" title="Ver plan"><a  class="bi bi-eye" href={{route('equipoTareash.show', $equipo->id)}}>  </a></button>
               <button style="background-color: Transparent;border: none;" title="Cargar ficha plan"><a  class="bi bi-plus-square" href={{route('equipoTareash.edit', $equipo->id)}}>  </a></button>
               <button style="background-color: Transparent;border: none;" title="Imprimir ficha plan"><a  class="bi bi-printer" href={{route('imprimirPlan', $equipo->id)}}>  </a></button>
              </td>
            <td scope="col" class="text-center; "></td>
            <td scope="col" class="text-center"></td>
          </tr>
        </thead>
        <br>
        <tbody>
        @foreach($plans as $plan)
        <tr>
          <td scope="row" class="text-left"><a href="{{route('plans.show', $plan->id)}}"><b>{{ $plan->codigo }} &nbsp;</b></a></td>
          <td class="text-left">{{ $plan->descripcion}} &nbsp; cada &nbsp; </td>
          <td class="text-rigth">&nbsp;{{ $plan->frecuencia}}&nbsp;{{ $plan->unidad}} </td>
        </tr>
        @endforeach
        </tbody>
      </table>
      <br>   

        <!-- EQUIPOS VINCULADOS -->
       </table>
        <br>
        <table>
        <thead>
          <tr>
            <td scope="col" style="text-align: rigth; font-size:150%;"><u> Equipos vinculados:</u></td>
            <td scope="col" class="text-center; "></td>
            <td scope="col" class="text-center"></td>
          </tr>
        </thead>
        <br>
        <tbody>
        @foreach($equiposB as $equipoB)
        <tr>
          <td scope="row" class="text-left"><b><a href="{{route('equipos.show', $equipoB->id)}}">{{ $equipoB->codEquipo }}</a> &nbsp;</b></td>
          <td class="text-left">{{ $equipoB->marca}},  </td>
          <td class="text-rigth">&nbsp;{{ $equipoB->modelo}} </td>
        </tr>
        @endforeach
        </tbody>
      </table>
      <br>
      <footer>
        <!-- Copyright © <?php echo date("Y");?> -->
        
        
        <TABLE BORDER=3  WIDTH="100%" CELLPADDING=1 CELLSPACING=0 >
          <TR  ALIGN=center>
        
            <TD Width=25% valign= middle> Revisión</TD>
            <TD Width=25% valign= middle> Elaboración</TD>
            <TD Width=50% colspan="2" valign= middle> Aprobaciones</TD>  
            
          </TR>
          <TR>
                <TD valign= top style="padding-left: 15px;" > Revisó:<br>LEI</TD>
                <TD style="text-align: center"  >Depto. Mantenimiento</TD>
                <TD height="55px" valign= top style="padding-left: 15px;" >Area origen:<br>Depto. Mantenimiento</TD>
                <TD valign= top style="padding-left: 15px;"> Area usuaria: <br> Fábrica</TD>
            </TR>
            
            
        
        </TABLE>
        </footer>
        <br>
   </div>  {{-- card 1 --}}
   </div>  {{-- card 2 --}}
  <br>  
</div>   
@stop


@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">

    
@stop

@section('js')
    <script> console.log('Hi!'); </script>
    
@stop