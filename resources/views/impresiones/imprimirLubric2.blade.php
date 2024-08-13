<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

<html>
<head>
<style>
    /* Establece el ancho del borde de las celdas */
    table {
        border-collapse: collapse;
        width: 100%;
        /* Remueve el borde de todas las tablas, excepto la que tiene el id "referencias" */
        border: none; 
    }

    th, td {
        border: 1px solid #000; /* Borde de las celdas */
        padding: 5px; /* Espaciado interno de las celdas */
        text-align: center; /* Alineación del contenido en el centro */
        font-size: 16px; /* Tamaño de fuente para las celdas */
    }

    .small-font {
        font-size: 12px; /* Tamaño de fuente más pequeño (ajusta este valor según tus preferencias) */
    }

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
        margin-left: 1cm;
        margin-right: 1cm;
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
        bottom: 1cm;
        left: 0cm;
        right: 0cm;
        height: 2.5cm;

        /** Estilos extra personales **/
        background-color:white;
        color: black;
        text-align: center;
        line-height: 0.5cm;
    }
    
    h4.title {
        font-size: 18px;
        margin-bottom: 10px;
        margin-top: 20px; /* Margen superior para separar el título de la tabla */
    }

</style>
</head>

<body>
<!-- Defina bloques de encabezado y pie de página antes de su contenido -->
<header>
<TABLE BORDER=3  WIDTH="100%" CELLPADDING=1 CELLSPACING=0 >
	<TR ALIGN=center >

    <TD ROWSPAN=3 Width=20% valign= middle> <img src="storage/logoIngenio2.png"   height="100px" width="130px"/></TD>
        <TD ROWSPAN=3 Width=60%><h1>Lubricación CHECK</h1><h3> {{ $equipo->codEquipo }}</h3></TD>
	    <TD>Check.V01</TD>
      
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
    <div class="small-font" style="margin-top: 5px;">
        C: Nivel correcto &nbsp;&nbsp;&nbsp; E: Exceso &nbsp;&nbsp;&nbsp; I: Incompleto
    </div> 
    <br>
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
  
<!-- Vista blade (impresiones/imprimirLubric.blade.php) -->

<!-- Vista blade (impresiones/imprimirLubric.blade.php) -->

<!-- Vista blade (impresiones/imprimirLubric.blade.php) -->
<h3 class="title">{{$equipo->det5}}</h3>
@foreach ($lubricacionArray as $puntoLubric => $lubricaciones)
    <table class="small-font"> <!-- Aplicamos la clase 'small-font' para reducir el tamaño de fuente -->
        <thead>
            <tr>
                <th colspan="15">
                    Punto de Lubricación: {{ $puntoLubric }}, {{ $lubricaciones[0]['descripcion'] }}, {{ $lubricaciones[0]['lubricante'] }}
                </th>
            </tr>
            <tr>
                @for ($i = 1; $i <= 15; $i++)
                    <th>{{ str_pad($i, 2, '0', STR_PAD_LEFT) }}</th>
                @endfor
            </tr>
        </thead>
        <tbody>
            @php
                $lcheckCount = 0;
            @endphp

            @foreach ($lubricaciones as $lubricacion)
                @if ($lcheckCount % 15 === 0)
                    <tr>
                @endif

                <td>{{ $lubricacion['muestra'] }}</td>
                @php
                    $lcheckCount++;
                @endphp

                @if ($lcheckCount % 15 === 0)
                    </tr>
                @endif
            @endforeach

            @php
                $remaining = 15 - ($lcheckCount % 15);
            @endphp

            @if ($remaining > 0 && $remaining < 15)
                @for ($i = 0; $i < $remaining; $i++)
                    <td></td>
                @endfor
                </tr>
            @endif
        </tbody>
    </table>
@endforeach


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
