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
 
margin-top: 4cm;
margin-left: 2cm;
margin-right: 2cm;
margin-bottom: 3.5cm;
}


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

.tabla-ot thead .encabezado {
    border-top-left-radius: 10px;
    border-top-right-radius: 10px;
    border: 3px solid black;
    background-color: #cfcdcddc;
    text-align: center;
    vertical-align: middle; 
}   


#tabla-ot {
    border: 3px solid black;
    border-top-left-radius: 10px;
    border-top-right-radius: 10px;
    border-bottom-left-radius: 10px;
    border-bottom-right-radius: 10px;
}

#tabla-ot tr {
    margin-bottom: 200px;
    padding-left: 20px;
}

#tabla-ot td {
    margin-left: 20px;
    padding-top: 5px;
    padding-bottom: 5px;
    padding-left: 20px;
}
.estilo-celda {
    background-color: #f0f5f0; /* Color de fondo */
    font-size: 14px; /* Tamaño de fuente */
    color: #000000; /* Color de fuente */
}
.estilo-celda1 {
    background-color: #f8f8fa; /* Color de fondo */
    font-size: 14px; /* Tamaño de fuente */
    color: #000000; /* Color de fuente */
} 


</style>
</head>
<body>
<!-- Defina bloques de encabezado y pie de página antes de su contenido -->
<header>
<TABLE BORDER=3  WIDTH="100%" CELLPADDING=1 CELLSPACING=0  >
	<TR ALIGN=center >

    <TD ROWSPAN=3 Width=20% valign= middle> <img src="storage/logoIngenio2.png"   height="100px" width="130px"/></TD>
        <TD ROWSPAN=3 Width=60%><h1>Orden de trabajo</h1><h2>O.d.T-{{$ot->id}}</h2></TD>
	    <TD>GFPO17.V01</TD>
      
	</TR>
	<TR>
        <TD>Revisión:</TD>
    </TR>
    <TR>
        <TD></TD> <!-- Aqui Nº de pagina  -->
    </TR>
    
    

</TABLE>

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


   
    
</head>
<body>

   
    
    
    <table id="tabla-ot" class="tabla-ot" border="1" >
        <thead>
            <tr>
                <td style="padding-top: 0px; text-align: center;" colspan="2" class="encabezado">
                    <h3 >O.d.T-{{$ot->id}}</h3>{{$equipo->det5}}
                 
                </td>
            </tr>
           
        </thead>
        <tbody>
            <tr>
                <td  class="estilo-celda"><strong>Esta orden está:</strong> <br> {{$ot->estado}}</td>
                <td class="estilo-celda"> <strong>Código:</strong> <br> {{$equipo->codEquipo}}</td>
            </tr>
            <tr>
                <td  class="estilo-celda"><strong>Solicitante:</strong> <br> {{$ot->solicitante}}</td>
                <td class="estilo-celda">
                    <strong>Sector:</strong> <br> {{$equipo->idSecc}}/{{$equipo->idSubSecc}}
                </td>
            </tr>
            <tr>
                <td  class="estilo-celda"><strong>Prioridad:</strong> <br> {{$ot->prioridad}}</td>
                <td class="estilo-celda"><strong>Pedido Fecha/Hora:</strong> <br> {{$ot->created_at}}</td>
            </tr>
            <tr>
                <td  class="estilo-celda"><strong>Trabajo asignado a:</strong> <br> {{$ot->asignadoA}}</td>
                <td class="estilo-celda"><strong>Fecha necesidad:</strong><br> {{$ot->fechaNecesidad}}</td>
            </tr>
            <tr>
                <td  class="estilo-celda"><strong>Realizada por:</strong> <br> {{$ot->realizadoPor}}</td>
                <td class="estilo-celda"><strong>Fecha entrega:</strong><br> {{$ot->fechaEntrega}}</td>
            </tr>
            <tr>
                <td  class="estilo-celda"><strong>Aprobada por:</strong> <br> {{$ot->aprobadoPor}}</td>
                <td class="estilo-celda"><strong>Fecha cierre:</strong> <br> {{$ot->updated_at}}</td>
            </tr>
            <tr>
                <td   class="estilo-celda1" colspan="2" class="estilo-celda"><strong>Descripción del pedido:</strong> {{$ot->det1}}</td>
            </tr>
            <tr>
                <td  class="estilo-celda1"colspan="2" class="estilo-celda"><strong>Descripción del trabajo realizado:</strong> {{$ot->det2}}</td>
            </tr>
            <tr>
                <td  class="estilo-celda1"colspan="2" class="estilo-celda"><strong>Detalle incompleto:</strong> {{$ot->det3}}</td>
            </tr>
        </tbody>
        
        
    </table>
    
    
    
    

</main>

  
</body>
<script type="text/php"> 
    
  if (isset($pdf)) { 
   //Shows number center-bottom of A4 page with $x,$y values
      $x = 469;  //X-axis i.e. vertical position 
      $y = 83; //Y-axis horizontal position
      $text = "Página {PAGE_NUM} de {PAGE_COUNT}";  //format of display message
      $font =  $fontMetrics->get_font("serif", "");
      $size = 12;
      $color = array(0,0,0);
      $word_space = 0.0;  //  default
      $char_space = 0.0;  //  default
      $angle = 0.0;   //  default
      $pdf->page_text($x, $y, $text, $font, $size, $color, $word_space, $char_space, $angle);
  }
  
</script>
</html>

