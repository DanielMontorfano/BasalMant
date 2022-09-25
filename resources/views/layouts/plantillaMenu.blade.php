<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    
  <link rel="stylesheet" href="{{asset('jquery-ui/jquery-ui.min.css')}}"> 
  <script src="{{asset('jquery/dist/jquery.js')}}"></script>
  <script src="{{asset('jquery-ui/jquery-ui.min.js')}}"></script>
  

   <style>
    header {
        background: #eae0f9;
        color:rgb(46, 46, 90);
    }
    .active {
        color: chocolate;
        font-weight:bolt;


    }
   </style>
   
 {{-- OJO LO agrego para que funciones todo!! --}}  
<link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
</head>
<body>
       <div class="container">
        @include('layouts.partials.headerConMenu')
      </div>
    
    {{-- yo cree la carpeta partials y el archivo header --}}
    
    <div class="container">
        
       @include('layouts.partials.FotosConMenu')
    </div>
    <div class="container">
       @include('layouts.partials.footer')
    </div>
</body>
</html>
        
