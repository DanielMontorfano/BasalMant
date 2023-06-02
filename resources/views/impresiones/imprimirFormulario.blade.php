<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

<html>
<head>
<style>
/**
Establezca los márgenes de la página en 0, por lo que el pie de página y el encabezado
puede ser de altura y anchura completas.
**/
@page {
margin: 0.5cm 0.5cm;
}

/** Defina ahora los márgenes reales de cada página en el PDF **/
body {
margin-top: 3.5cm;
margin-left: 2cm;
margin-right: 2cm;
margin-bottom: 4cm;
}

/** Definir las reglas del encabezado **/
header {
position: fixed;
top: 0cm;
left: 0cm;
right: 0cm;
height: 3cm;

/** Estilos extra personales **/
background-color: white;
color: black;
text-align: center;
line-height: .5cm;
}

/** Definir las reglas del pie de página **/
footer {
position: fixed;
bottom: 0.9cm;
left: 0cm;
right: 0cm;
height: 2.0cm;

/** Estilos extra personales **/
background-color:white;
color: black;
text-align: center;
line-height: 0.5cm;
}

.rounded-table {
    width: 100%;
    border-collapse: separate;
    border-spacing: 0;
    border: 1px solid #9c9a9a;
    border-radius: 5px;
    overflow: hidden;
  }

  .rounded-table td {
    padding: 8px;
    border: 1px solid  #9c9a9a;
  }



</style>
</head>
<body>
<!-- Defina bloques de encabezado y pie de página antes de su contenido -->
<header>
<TABLE BORDER=3  WIDTH="100%" CELLPADDING=1 CELLSPACING=0 >
	<TR ALIGN=center >

    <TD ROWSPAN=3 Width=20% valign= middle> <img src="storage/logoIngenio2.png"   height="100px" width="130px"/></TD>
        <TD ROWSPAN=3 Width=60%><h1>Formulario F-{{$formulario->id}}</h1><h3> {{ $equipo->codEquipo }}</h3></TD>
	    <TD>GFPO17.V01</TD>
      
	</TR>
	<TR>
        <TD>Revisión:{{ $formulario->created_at->format('d-m-Y') }}</TD>
    </TR>
    <TR>
        <TD>Página 1 de 1:</TD>
    </TR>
    
    

</TABLE>
<br><br> 
</header>




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

<!-- Envuelva el contenido de su PDF dentro de una etiqueta principal -->
<main>
  <br>
  <br>
  @if(isset($PlanP))
    @foreach($PlanP as $plan)
    <table class="table-bordered">
      <tr>
      <ul style="list-style-type: none; margin-left: -37px;">
        
        <li style="font-size: 110%; "><strong>Sección: {{ $equipo->idSecc }}</strong></li>
        <li style="font-size: 110%;"><strong>Plan:</strong>&nbsp;{{ $plan['nombre'] }} </li>
        <li style="font-size: 110%;"><strong>Frecuencia: </strong>{{ $plan['frecuencia'] }} {{ $plan['unidad'] }} </li>
        <li style="font-size: 110%;"><strong>Fecha de ejecución:</strong>{{ $formulario->created_at->format('d-m-Y') }} </li>
        <li style="font-size: 110%;"><strong>Descripción del plan:</strong>&nbsp;{{ $plan['descripcion'] }}</li>
      </ul> 
      </tr>
      <br>
    </table>
      @if(isset($ProtocoloP))
      
        @foreach($ProtocoloP as $protocolo)
          <div class="col-12" align="left"><strong>{{ $protocolo['descripcion'] }}</strong></div> 
          <div style="padding-top: 1%;" class="row align-items-end">
           
           
            <table style="border-collapse: collapse; width: 100%;">
              @foreach($Tareas as $tarea)
                @if($tarea['tcheck'] !== null && $protocolo['codProto'] == $tarea['cod'])
                  <tr>
                    <td style="border: 1px solid #d0bfbf; padding: 8px; text-align: right;" width="5%" id="tcheck">
                      <strong>{{ $tarea['tcheck'] }}</strong>
                    </td>
                    <td style="border: 1px solid #d0bfbf; padding: 8px 8px 8px 15px; text-align: left;" width="95%">
                      {{ $tarea['descripcion'] }}
                    </td>
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
  <br>
  <div style="font-size: 14px; margin-top: 20px;">
    <p style="display: inline; margin-right: 10px;"><strong>R:</strong> <span style="font-size: 12px; color: green;">Realizado</span></p>
    <p style="display: inline; margin-right: 10px;"><strong>OP:</strong> <span style="font-size: 12px; color: green;">Operativo</span></p>
    <p style="display: inline; margin-right: 10px;"><strong>INC:</strong> <span style="font-size: 12px; color: orange;">Incompleto</span></p>
    <p style="display: inline;"><strong>NR:</strong> <span style="font-size: 12px; color: red;">No realizado</span></p>
  </div>

  <table class="rounded-table">
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
      @if($formulario->correccion !== null)
        <td colspan="2">Corrección realizada: {{$formulario->correccion}} en la fecha {{ $formulario->created_at->format('d-m-Y') }}</td>
      @endif
    </tr>
  
    <tr>
      <td>Realizado por: {{$formulario->tecnico}}</td>
      <td>Supervisado por: {{$formulario->supervisor1}}</td>
    </tr>
  </table>
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  

  
</main>

  
</body>


</html>