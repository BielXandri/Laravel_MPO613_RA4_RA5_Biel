@extends('layouts.master')

@section('content')
    <center>
        <h1>{{ $title }}</h1>
        @if ($count == 0)
            <font color="red">No se ha encontrado ninguna pelicula</font>
        @else
            <h2>{{ $count }}</h2>
        @endif
        <br>
        <div class="text-center mt-4">
        <a href="/" class="btn btn-primary">Volver al Inicio</a>
    </div>
    </center>
@endsection