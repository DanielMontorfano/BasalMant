@extends('adminlte::page')

@section('title', 'En construcción')

@section('content_header')
    <h1>En construcción</h1>
@stop

@section('content')
<div class="card border-primary" style="background: linear-gradient(to left,#495c5c,#030007);">
    <div class="card-body text-center">
        <h2>Estamos trabajando en esta sección, pronto estará disponible.</h2>
    </div>
</div>

<div class="text-right" style="font-size: 0.6em; color: orange; margin-top: 20px;">
    Mandioca Soft
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Página en construcción'); </script>
@stop
