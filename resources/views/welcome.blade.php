@extends('layouts.master')

@section('title', 'Bienvenido a Movies List')

@section('content')
    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <h1 class="mt-4">Lista de Películas</h1>
    <ul>
        <li><a href="/filmout/oldFilms">Pelis antiguas</a></li>
        <li><a href="/filmout/newFilms">Pelis nuevas</a></li>
        <li><a href="/filmout/filmsByYear">Pelis por año</a></li>
        <li><a href="/filmout/filmsByGenre">Pelis por género</a></li>
        <li><a href="/filmout/sortFilms">Pelis ordenadas por año</a></li>
        <li><a href="/filmout/count">Pelis contadas</a></li>
    </ul>

    <h2 class="mb-4">Añadir Película</h2>   
    
    <form action="{{ route('filmin.addFilm') }}" method="post">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
        </div>
        
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="year" class="form-label">Año</label>
                <input type="number" class="form-control" id="year" name="year" value="{{ old('year') }}" required min="1888" max="{{ date('Y') }}">
            </div>
            <div class="col-md-6 mb-3">
                <label for="duration" class="form-label">Duración (min)</label>
                <input type="number" class="form-control" id="duration" name="duration" value="{{ old('duration') }}" required min="1">
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="genre" class="form-label">Género</label>
                <input type="text" class="form-control" id="genre" name="genre" value="{{ old('genre') }}" required>
            </div>
            <div class="col-md-6 mb-3">
                <label for="country" class="form-label">País</label>
                <input type="text" class="form-control" id="country" name="country" value="{{ old('country') }}" required>
            </div>
        </div>

        <div class="mb-4">
            <label for="img_url" class="form-label">Imagen URL</label>
            <input type="url" class="form-control" id="img_url" name="img_url" value="{{ old('img_url') }}" required>
        </div>
        
        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
@endsection