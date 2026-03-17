@extends('layouts.master')

@section('content')
    <h1 class="mt-4 text-center">{{ $title }}</h1>

    <div class="row justify-content-center mt-4">
        <div class="col-md-4">
            <form action="{{ route('actorsByDecade') }}" method="get" id="decadeForm">
                <div class="input-group mb-3">
                    <label class="input-group-text" for="decade">Década</label>
                    <select class="form-select" id="decade" name="decade" onchange="document.getElementById('decadeForm').submit()">
                        <option value="" {{ empty($selected_decade) ? 'selected' : '' }}>Selecciona una década...</option>
                        <option value="1980" {{ $selected_decade == '1980' ? 'selected' : '' }}>1980</option>
                        <option value="1990" {{ $selected_decade == '1990' ? 'selected' : '' }}>1990</option>
                        <option value="2000" {{ $selected_decade == '2000' ? 'selected' : '' }}>2000</option>
                        <option value="2010" {{ $selected_decade == '2010' ? 'selected' : '' }}>2010</option>
                        <option value="2020" {{ $selected_decade == '2020' ? 'selected' : '' }}>2020</option>
                    </select>
                </div>
            </form>
        </div>
    </div>

    @if($actors !== null)
        @if($actors->isEmpty())
            <div class="alert alert-danger mt-4 text-center">
                No se ha encontrado ningún actor nacido en la década seleccionada.
            </div>
        @else
            <div class="table-responsive mt-4">
                <table class="table table-bordered table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Nombre</th>
                            <th scope="col">Fecha de Nacimiento</th>
                            <th scope="col">Nacionalidad</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($actors as $actor)
                            <tr>
                                <td>{{ $actor->name }} {{ $actor->surname }}</td>
                                <td>{{ $actor->birthdate }}</td>
                                <td>{{ $actor->country }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    @endif

    <div class="text-center mt-4">
        <a href="/" class="btn btn-primary">Volver al Inicio</a>
    </div>
@endsection
