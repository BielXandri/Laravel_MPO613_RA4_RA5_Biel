@extends('layouts.master')


@section('content')
    <h1 class="mt-4 text-center">{{ $title }}</h1>

    @if(empty($films))
        <div class="alert alert-danger mt-4 text-center">
            No se ha encontrado ninguna película.
        </div>
    @else
        <div class="table-responsive mt-4">
            <table class="table table-bordered table-striped">
                <thead class="thead-dark">
                    <tr>
                        {{-- Generamos los encabezados automáticamente --}}
                        @foreach($films as $film)
                            @foreach(array_keys($film) as $key)
                                <th scope="col">{{ ucfirst($key) }}</th>
                            @endforeach
                            @break
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @foreach($films as $film)
                        <tr>
                            <td>{{ $film['name'] }}</td>
                            <td>{{ $film['year'] }}</td>
                            <td>{{ $film['genre'] }}</td>
                            <td>
                                <img src="{{ $film['img_url'] }}" alt="{{ $film['name'] }}" style="width: 100px; height: auto; border-radius: 5px;">
                            </td>
                            <td>{{ $film['country'] }}</td>
                            <td>{{ $film['duration'] }} min</td>
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