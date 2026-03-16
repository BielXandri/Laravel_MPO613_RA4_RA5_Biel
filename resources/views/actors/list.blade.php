@extends('layouts.master')

@section('content')
    <h1 class="mt-4 text-center">{{ $title }}</h1>

    @if($actors->isEmpty())
        <div class="alert alert-danger mt-4 text-center">
            No se ha encontrado ningún actor.
        </div>
    @else
        <div class="table-responsive mt-4">
            <table class="table table-bordered table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Apellidos</th>
                        <th scope="col">Fecha de Nacimiento</th>
                        <th scope="col">País</th>
                        <th scope="col">Imagen</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($actors as $actor)
                        <tr>
                            <td>{{ $actor->id }}</td>
                            <td>{{ $actor->name }}</td>
                            <td>{{ $actor->surname }}</td>
                            <td>{{ $actor->birthdate }}</td>
                            <td>{{ $actor->country }}</td>
                            <td>
                                <img src="{{ $actor->img_url }}" alt="{{ $actor->name }}" style="width: 100px; height: auto; border-radius: 5px;">
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif

    <div class="text-center mt-4">
        <a href="/" class="btn btn-primary">Volver al Inicio</a>
    </div>
@endsection
