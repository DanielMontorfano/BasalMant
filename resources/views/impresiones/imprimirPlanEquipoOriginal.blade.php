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
margin-top: 2cm;
margin-left: 2cm;
margin-right: 2cm;
margin-bottom: 2cm;
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
bottom: 0.5cm;
left: 0cm;
right: 0cm;
height: 2.0cm;

/** Estilos extra personales **/
background-color:white;
color: black;
text-align: center;
line-height: 0.5cm;
}






</style>
</head>
<body>
<!-- Defina bloques de encabezado y pie de página antes de su contenido -->
<header>
<TABLE BORDER=3  WIDTH="100%" CELLPADDING=1 CELLSPACING=0 >
	<TR ALIGN=center >

    <TD ROWSPAN=3 Width=20% valign= middle> <img src="storage/logoIngenio2.png"   height="100px" width="130px"/></TD>
        <TD ROWSPAN=3 Width=60%><h1>Ficha plan</h1><h2>PLAN-{{$equipo->codEquipo}}</h2></TD>
	    <TD>GFPO17.V01</TD>
      
	</TR>
	<TR>
        <TD>Revisión:</TD>
    </TR>
    <TR>
        <TD>Página 1 de 1:</TD>
    </TR>
    
    

</TABLE>
<br><br> hola
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
        <TD valign= top ><br></TD>
        <TD style="text-align: center"  >Equipo de calidad</TD>
        <TD height="55px" valign= top >&nbsp; Area origen:<br></TD>
        <TD valign= top >&nbsp; Area usuaria:</TD>
    </TR>
    
    

</TABLE>
</footer>

<!-- Envuelva el contenido de su PDF dentro de una etiqueta principal -->
<main>
<br>
<br>
<br>
<br>
<br>


  @if(isset($PlanP))
  @foreach($PlanP as $plan)
  <table  id="listado"  BORDER=0>  
    <tr>
      <td style="font-size:200%;" class="col-12" align="left"><strong>{{$plan['nombre']}}</strong> <br> {{$plan['descripcion']}} <br><br></td> 
    </tr>
    <tr>
      <td class="col-12" align="center" >
        @if(isset($ProtocoloP))
        @foreach($ProtocoloP as $protocolo)
        <div class="col-12" align="left"><strong>{{$protocolo['descripcion']}}</strong></div> <br>
        <div class="row align-items-end">
          @foreach($Tareas as $tarea) 
          @if($protocolo['codProto'] ==$tarea['cod'])
         
          <div class="col-6" align="left"><li>{{$tarea['descripcion']}}</li></div>
          <div class="col-6" align="left">{{$tarea['duracion']}} {{$tarea['unidad']}}</div>
          
          
         
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



</main>

  
</body>


</html>