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
 
 margin-top: 4.5cm;
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
 
 
</style>
</head>
<body>
<!-- Defina bloques de encabezado y pie de página antes de su contenido -->
<header>
<TABLE BORDER=3  WIDTH="100%" CELLPADDING=1 CELLSPACING=0 >
	<TR ALIGN=center >

    <TD ROWSPAN=3 Width=20% valign= middle> <img src="storage/logoIngenio2.png"   height="100px" width="130px"/></TD>
        <TD ROWSPAN=3 Width=60%><h1>Listado de {{$titulo}}</h1><h2></h2></TD>
	    <TD>GFPO17.V01</TD>
      
	</TR>
	<TR>
        <TD>Revisión:</TD>
    </TR>
    <TR>
        <TD></TD>
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
  <table id="miTabla">
    <thead>
      <tr ALIGN=center>
        <th>Nº</th>
        <th>{{$T1}}</th>
        <th>{{$T2}}</th>
        <th>{{$T3}}</th>
        <th></th>
        <th></th>
      </tr>
    </thead>

    <tbody>
      <?php $i = 1; ?>
      @foreach($listados as $listado)
      <tr ALIGN=left>
        <td>{{ $i++ }}</td> 
        <td>{{ $listado['var1'] }}</td> 
        <td>{{ $listado['var2'] }}</td>
        <td>{{ $listado['var3'] }}</td>
        <td></td>
        <td></td>
      </tr>
      @endforeach
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