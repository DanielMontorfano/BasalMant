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
        <TD ROWSPAN=3 Width=60%><h2>FICHA TECNICA DE EQUIPO</h2></TD>
	    <TD>GFRE12.V01</TD>
      
	</TR>
	<TR>
        <TD>Vigencia: 09/02/2023</TD>
    </TR>
    <TR>
        <TD>Revisión: 09/02/2023</TD>
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
  
  <Ul style="list-style-type: none; margin-left: -37px;">
    <li style="font-size:130%;"><strong>Código:</strong>&nbsp;  {{$equipo->codEquipo}}</li>
    <li style="font-size:130%;"><strong>Marca:</strong>&nbsp;  {{$equipo->marca}}</li>
    <li style="font-size:130%;"><strong>Modelo:</strong>&nbsp;  {{$equipo->modelo}}</li>
    <li style="font-size:130%;"><strong>Sección:</strong>&nbsp;  {{$equipo->idSecc}}</li>
    <li style="font-size:130%;"><strong>Subsección:</strong>&nbsp;  {{$equipo->idSubSecc}}</li>
  </Ul>  
    
  <Ul style="margin-left: -25px;">
    <li style="font-size:100%;">&nbsp;  {{$equipo->det1}}</li>
    <li style="font-size:100%;">&nbsp;  {{$equipo->det2}}</li>
    <li style="font-size:100%;">&nbsp;  {{$equipo->det3}}</li>
    <li style="font-size:100%;">&nbsp;  {{$equipo->det4}}</li>
    <li style="font-size:100%;">&nbsp;  {{$equipo->det5}}</li>
  </Ul>  

    
    
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
            <td scope="col" style="text-align: rigth; font-size:150%;"><u> Plan:</u></td>
            <td scope="col" class="text-center; "></td>
            <td scope="col" class="text-center"></td>
          </tr>
        </thead>
        <br>
        <tbody>
        @foreach($plans as $plan)
        <tr>
          <td scope="row" class="text-left"><b>{{ $plan->codigo }} &nbsp;</b></td>
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
          <td scope="row" class="text-left"><b>{{ $equipoB->codEquipo }} &nbsp;</b></td>
          <td class="text-left">{{ $equipoB->marca}},  </td>
          <td class="text-rigth">&nbsp;{{ $equipoB->modelo}} </td>
        </tr>
        @endforeach
        </tbody>
      </table>
      <br>   


</main>

  
</body>

{{-- <script type="text/php"> 
    
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
  
</script> --}}

</html>