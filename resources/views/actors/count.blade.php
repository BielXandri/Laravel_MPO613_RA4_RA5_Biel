@extends('layouts.master')

@section('content')
    <center>
        <h1>{{ $title }}</h1>
        <h2>Total Actores: {{ $count }}</h2>
        <br>
        <div class="text-center mt-4">
            <a href="/" class="btn btn-primary">Volver al Inicio</a>
        </div>
    </center>
@endsection
