@extends('layouts.plantilla')
@section('title', 'Ver ' . $tarea->descripcion)
@section('content')
<h1>Aqui se verá una tarea en particular {{$tarea->descripcion}}</h1>

@endsection




