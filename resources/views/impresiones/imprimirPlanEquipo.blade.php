@php
use Illuminate\Support\Str;
@endphp
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

<html>
<head>
<style>
@page {
    margin: 0.5cm 0.5cm;
}

body {
    margin-top: 4cm;
    margin-left: 2cm;
    margin-right: 2cm;
    margin-bottom: 3.5cm;
}

header {
    position: fixed;
    top: 0cm;
    left: 0cm;
    right: 0cm;
    height: 4cm;
    text-align: center;
    line-height: .5cm;
}

footer {
    position: fixed;
    bottom: 0.5cm;
    left: 0cm;
    right: 0cm;
    height: 2.5cm;
    text-align: center;
    line-height: 0.5cm;
}
</style>
</head>
<body>
<header>
    <table border="3" width="100%" cellpadding="1" cellspacing="0">
        <tr align="center">
            <td rowspan="3" width="20%" valign="middle">
                <img src="storage/logoIngenio2.png" height="100px" width="130px"/>
            </td>
            <td rowspan="3" width="60%"><h1>FICHA PLAN</h1></td>
            <td>GFRE11.V02</td>
        </tr>
        <tr>
            <td>Vigencia: 09/02/2023</td>
        </tr>
        <tr>
            <td>Revisión: 02/09/2024</td>
        </tr>
    </table>
</header>

<footer>
    <table border="3" width="100%" cellpadding="1" cellspacing="0">
        <tr align="center">
            <td width="25%" valign="middle">Revisión</td>
            <td width="25%" valign="middle">Elaboración</td>
            <td width="50%" colspan="2" valign="middle">Aprobaciones</td>
        </tr>
        <tr>
            <td valign="top" style="padding-left: 15px;">Revisó:<br>LEI</td>
            <td style="text-align: center">Depto. Mantenimiento</td>
            <td height="55px" valign="top" style="padding-left: 15px;">Área origen:<br>Depto. Mantenimiento</td>
            <td valign="top" style="padding-left: 15px;">Área usuaria:<br>Fábrica</td>
        </tr>
    </table>
</footer>

<main>
    @if(isset($PlanP))
        @foreach($PlanP as $plan)
        <ul style="list-style-type: none; margin-left: -37px;">
            <li style="font-size:110%;"><strong>Código del equipo:</strong>&nbsp; {{$equipo->codEquipo}}</li>
            <li style="font-size:110%;"><strong>Marca del equipo:</strong>&nbsp; {{$equipo->marca}}</li>
            <li style="font-size:110%;"><strong>Modelo del equipo:</strong>&nbsp; {{$equipo->modelo}}</li>
            <li style="font-size:110%;"><strong>Nombre:</strong>&nbsp; {{$plan['nombre']}}</li>
            <li style="font-size:110%;"><strong>Descripción:</strong>&nbsp; {{$plan['descripcion']}}</li>
            <li style="font-size:110%;"><strong>Frecuencia:</strong>&nbsp; 
                {{$plan['frecuencia']}}&nbsp;
                {{$plan['frecuencia'] == 1 ? Str::singular($plan['unidad']) : $plan['unidad']}}
            </li>
        </ul> 
        <br>

        @if(isset($ProtocoloP))
            @foreach($ProtocoloP as $protocolo)
            <div class="col-12" style="display: flex; justify-content: space-between;">
                <strong>{{$protocolo['descripcion']}}</strong>
            </div>

            <div style="padding-top: 1%;" class="row align-items-end">
                @foreach($Tareas as $tarea) 
                    @if($protocolo['codProto'] == $tarea['cod'])
                    <div class="col-6" align="left">
                        <p style="margin: 4px;">
                            <li>
                                {{$tarea['descripcion']}} 
                                <span style="float: right;">{{$tarea['duracion']}} {{$tarea['unidad']}}</span>
                            </li>
                        </p>
                    </div>
                    @endif 
                @endforeach  
                <div>&nbsp;</div>
            </div>
            @endforeach  
        @endif

        <!-- Mostrar totalDuracion después de las tareas -->
          <div style="text-align: center; margin: 0 auto; padding-top: 10px;">
              <p style="font-size: 140%; margin: 0;">
                  <strong>Total Duración:</strong> {{ $totalHoras }} horas y {{ $totalMinutos }} minutos
              </p>
          </div>


        @endforeach
    @endif
</main>
</body>
</html>
