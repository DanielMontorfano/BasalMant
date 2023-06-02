@extends('adminlte::page') 

@section('title', 'Ver')
@section('content_header')
@include('layouts.partials.menuPlanes')
@stop
@section('css')
<style>
  a {
    color: #e8e545;
}
</style>
@endsection


@section('content')
<div class="card border-primary" style="background: linear-gradient(to left,#495c5c,#030007); ">
<div class="card-body "  style="max-width: 95;">

  <header>
    <TABLE BORDER=3  WIDTH="100%" CELLPADDING=1 CELLSPACING=0  >
      <TR ALIGN=center >
    
        <TD ROWSPAN=3 Width=20% valign= middle> <img src="../storage/LogoIngenio2.png"   height="100px" width="130px"/></TD>
            <TD ROWSPAN=3 Width=60%><h1>Ficha plan</h1><h2>{{$plan->codigo}}</h2></TD>
          <TD>GFRE11.V01</TD>
          
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
<br>
<br>
<br>
  
  <Ul style="list-style-type: none; margin-left: -37px;">
    <li style="font-size:150%;"><strong>Nombre:</strong>&nbsp;  {{$plan->nombre}}</li>
    <li style="font-size:150%;"><strong>Descripción:</strong>&nbsp; {{$plan->descripcion}}</li>
    <li style="font-size:150%;"><strong>Frecuencia:</strong>&nbsp;  {{$plan->frecuencia}} &nbsp; {{$plan->unidad}} </li>
 
  </Ul>  
    <br>

    <br>
    
  <!-- REPUESTOS -->

  <table class="table" STYLE="background: transparent;">
    <thead>
       <tr>
         <th style="text-align: left; color: #ffffff;" scope="col">Código</th>
         <th style="text-align: center; color: #ffffff;" scope="col">Descripción</th>
         
         
       </tr>
     </thead>
     @if(isset($ProtocoloP))
     @foreach($ProtocoloP as $protocolo)
       <form action="{{route('planproto.store')}}" method="POST">
         @csrf
          
           <tbody>
                 <tr>
                   <th title="Editar este protocolo" STYLE="color: #e8e545; font-family: Times New Roman;  font-size: 14px; "scope="row"> <a href="{{route('protocolos.edit', $protocolo['idProto'])}}">{{$protocolo['codProto']}}</a></th>
                   <td STYLE="color: #e8e545; font-family: Times New Roman;  font-size: 14px; ">{{$protocolo['descripcion']}}</td>
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
        <br>

        

        
      <br>   

        
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
                <TD valign= top ><br></TD>
                <TD style="text-align: center"  >Equipo de calidad</TD>
                <TD height="55px" valign= top >&nbsp; Area origen:<br></TD>
                <TD valign= top >&nbsp; Area usuaria:</TD>
            </TR>
            
            
        
        </TABLE>
        </footer>
        <br>
   </div>  {{-- card 1 --}}
   </div>  {{-- card 2 --}}
  <br>   
  <button onclick="mostrarAdvertencia()">Mostrar advertencia</button>  
@stop


@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">

    
@stop

@section('js')
    <script> console.log('Hi!'); </script>
   
@stop