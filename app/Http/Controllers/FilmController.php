<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;


use App\Models\Film;

class FilmController extends Controller
{
    /**
     * List films older than input year 
     */
    public function listOldFilms($year = null)
    {        
        if (is_null($year)) $year = 2000;
    
        $title = "Listado de Pelis Antiguas (Antes de $year)";    
        $old_films = Film::where('year', '<', $year)->get()->toArray();

        return view('films.list', ["films" => $old_films, "title" => $title]);
    }

    /**
     * List films younger than input year
     */
    public function listNewFilms($year = null)
    {
        if (is_null($year)) $year = 2000;

        $title = "Listado de Pelis Nuevas (Después de $year)";
        $new_films = Film::where('year', '>=', $year)->get()->toArray();

        return view('films.list', ["films" => $new_films, "title" => $title]);
    }

    /**
     * List TODAS las películas o filtra x año.
     */
    public function listFilmsByYear($year = null)
    {
        if (is_null($year)) {
            $title = "Listado de todas las películas (Filtralas por año)";
            $films = Film::all()->toArray();
            return view("films.list", ["films" => $films, "title" => $title]);
        }

        $films_filtered = Film::where('year', $year)->get()->toArray();
        $title = "Listado de peliculas del año $year";
        return view("films.list", ["films" => $films_filtered, "title" => $title]);
    }
 
    /**
     * List films filtered by genre
     */
    public function listFilmsByGenre($genre = null)
    {
        if (is_null($genre)) {
            $title = "Listado de todas las películas (Filtralas por género))";
            $films = Film::all()->toArray();
            return view("films.list", ["films" => $films, "title" => $title]);
        }

        $films_filtered = Film::where('genere', $genre)->get()->toArray();
        $title = "Listado de peliculas del genero $genre";
        return view("films.list", ["films" => $films_filtered, "title" => $title]);
    }

    /**
     * List TODAS las películas ordenadas por año DESCENDENTE.
     */
    public function sortFilmsByYear() {
        $films = Film::orderBy('year', 'desc')->get()->toArray();
        $title = "Listado de todas las películas ordenadas por año (DESCENDENTE)";
        return view('films.list', ['films' => $films,'title' => $title]);
    } 

    /**
     * Cuenta el número total de películas.
     */
    public function countFilms() {
        $count = Film::count();
        $title = "Contador de Películas";

        return view('films.count', ['count' => $count, 'title' => $title]);
    }

    /**
     * Validation if film exists
     */
    public function isFilm($name): bool
    {
        return Film::where('name', $name)->exists();
    }

    public function listFilms()
    {
        $films = Film::all()->toArray();
        $title = "Listado de todas las películas";
        return view("films.list", ["films" => $films, "title" => $title]);
    }

    public function createFilm(Request $request)
    {
        $validated = $request->validate([
            'name'     => 'required|string|unique:films,name',
            'year'     => 'required|integer|min:1888',
            'genere'    => 'required|string',
            'country'  => 'required|string',
            'duration' => 'required|integer|min:1',
            'img_url'  => 'required|string',
        ]);

        Film::create($validated);

        return redirect('/')->with('success', 'Película añadida correctamente.');
    }
}