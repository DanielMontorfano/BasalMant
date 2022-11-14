<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
   {{-- <script src="https://cdn.tailwindcss.com"></script> --}} 

   
  {{--  EL MEJOR EJEMPLO DE LA PAGINA DE jquery-ui (https://jqueryui.com/autocomplete/) !!! --}}
  <link rel="stylesheet" href="{{asset('jquery-ui/jquery-ui.min.css')}}"> 
  <script src="{{asset('jquery/dist/jquery.js')}}"></script>
  <script src="{{asset('jquery-ui/jquery-ui.min.js')}}"></script>
  

   <style>
    header {
        background: linear-gradient(to right,#0f0914,#d9c5ec);
        color:rgb(46, 46, 90);
    }
    .active {
        color: chocolate;
        font-weight:bolt;
    
    }
     

    footer {
        background: linear-gradient(to right,#1e2020,#030007);
        color:rgb(46, 46, 90);
    }
    
    
   </style>
   
 {{-- 1) OJO LO agrego para que funciones todo!! --}}  
<link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}"> 
<meta name="Basalmant" content="width=device-width, initial-scale=1.0"> 
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
 {{-- 1) OJO LO agrego para que funcione todo!! --}}  


{{-- 2) PARA PROBAR 1 hace referencia a la tabla en la impresion--}}
<link rel="shortcut icon" href="#" />  
 <!-- Bootstrap CSS -->
<link rel="stylesheet" href="{{asset('dataprint/bootstrap/css/bootstrap.min.css')}}">
<!-- CSS personalizado --> 
<link rel="stylesheet" href="{{asset('dataprint/main.css')}}">  
<!--datables CSS básico-->
<link rel="stylesheet" type="text/css" href="{{asset('dataprint/datatables/datatables.min.css')}}">
<!--datables estilo bootstrap 4 CSS-->  
<link rel="stylesheet"  type="text/css" href="{{asset('dataprint/datatables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css')}}">
<!--font awesome con CDN para iconos de  pdf print exel-->  
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" >
{{-- 2) PARA PROBAR 1 hace referencia a la tabla en la impresion--}}

</head>
<body>
    {{-- yo cree la carpeta partials y el archivo header --}}
    <div class="container"> 
    @include('layouts.partials.header')
    </div>
    
    <div class="container">
        <div class="card" STYLE="background: linear-gradient(to right,#d7cedb,#baa7d3);" >
            <div class="card-header" STYLE="background: linear-gradient(to right,#404d42,#d5d1db);">
                  {{--  @include('layouts.partials.menu') --}}
                @yield('content')
                @include('layouts.partials.librerias') {{-- Impotante trae todas las librerias --}}
            </div>
       </div>
    </div>


    <div class="container"> 
    @include('layouts.partials.footer')
    </div>
</body>
</html>