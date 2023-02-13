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
  height: 100%;  /**para que no se corte con footer */
}
body {
  display: flex; /**para que no se corte con footer */
  flex-direction: column; /**para que no se corte con footer */
margin-top: 2cm;
margin-left: 2cm;
margin-right: 2cm;
margin-bottom: 2cm;
}
main {
  flex: 1; /**para que no se corte con footer */
}

/** Definir las reglas del encabezado **/
header {
position: fixed;
top: 0cm;
left: 0cm;
right: 0cm;
height: 4cm;

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
height: 3.0cm;

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

</header>




<footer>
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
</footer>

<!-- Envuelva el contenido de su PDF dentro de una etiqueta principal -->
<main>

<br>
<br>
<br>


  @if(isset($PlanP))
  @foreach($PlanP as $plan)
  <Ul style="list-style-type: none; margin-left: -37px;">
    <li style="font-size:150%; text-align:center"><strong><u>{{$equipo->marca}}&nbsp;{{$equipo->modelo}} </u></strong></li><br><br>
    <li style="font-size:110%;"><strong>Aplicar en:</strong>&nbsp;  {{$plan['nombre']}}</li>
    <li style="font-size:110%;"><strong>Clasificación del plan:</strong>&nbsp;  {{$plan['descripcion']}}</li>
  </Ul> 
<br>


  
    
      
        @if(isset($ProtocoloP))
        @foreach($ProtocoloP as $protocolo)
        <div class="col-12" align="left"><strong>{{$protocolo['descripcion']}}</strong></div> 
        <div style="padding-top: 1%;" class="row align-items-end">
          @foreach($Tareas as $tarea) 
          @if($protocolo['codProto'] ==$tarea['cod'])
         
          <div class="col-6" align="left"><p style="margin-top: 10px; margin-right: 5px; margin-bottom: 10px; margin-left: 5px;"><li>{{$tarea['descripcion']}}</li></p></div>
         
          
          
         
          @endif 
          @endforeach  
          <div>&nbsp;</div>
        </div>
        @endforeach  
        @endif
      
   

  
  @endforeach
  @endif   



</main>

  
</body>

<script type="text/php"> 
    
    if (isset($pdf)) { 
     //Shows number center-bottom of A4 page with $x,$y values
        $x = 469;  //X-axis i.e. vertical position 
        $y = 85; //Y-axis horizontal position
        $text = "Página {PAGE_NUM} de {PAGE_COUNT}";  //format of display message
        $font =  $fontMetrics->get_font("serif", "");
        $size = 26;
        $color = array(5,0,0);
        $word_space = 0.0;  //  default
        $char_space = 0.0;  //  default
        $angle = 0.0;   //  default
        $pdf->page_text($x, $y, $text, $font, $size, $color, $word_space, $char_space, $angle);
    }
    
</script>
</html>

