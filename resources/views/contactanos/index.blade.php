@extends('layouts.plantilla')
@section('title', 'Contactanos')
@section('content')
<h1>Dejanos un mensaje</h1>

<form action="{{route('contactanos.sotre')}}" method="POST">
@csrf
<label>Nombre:
    <br>
    <input type="text" name="name">
</label>
<br>
@error('name')
<p><strong>{{$message}}</strong></p>
@enderror

<label>Correo:
    <br>
    <input type="text" name="correo">

</label>
<br>
@error('correo')
<p><strong>{{$message}}</strong></p>
@enderror

<label >Mensaje:
    <br>
    <textarea name="mensaje" rows=4>
    </textarea>
</label>
<br>
@error('mensaje')
<p><strong>{{$message}}</strong></p>
@enderror
<button type="submit">
    enviar mensaje
</button>
</form>

@if (session('info'))
<script>
alert("{{session('info')}}");
</script>
@endif

@endsection