<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Actor;

class ActorController extends Controller
{
    /**
     * List all actors from the database.
     */
    public function listActors()
    {
        $actors = Actor::all();
        $title = "Listado de Actores";
        
        return view('actors.list', ["actors" => $actors, "title" => $title]);
    }

    /**
     * Cuenta el número total de actores.
     */
    public function countActors(Request $request) {
        $count = Actor::count();
        $title = "Contador de Actores";

        return view('actors.count', ['count' => $count, 'title' => $title]);
    }

    /**
     * List actors born in a specific decade.
     */
    public function listActorsByDecade(Request $request)
    {
        $decade = $request->input('decade');
        $actors = null;
        $title = "Listado de Actores por Década";

        if ($decade) {
            $start_year = $decade;
            $end_year = $decade + 9;
            
            $actors = Actor::whereYear('birthdate', '>=', $start_year)
                           ->whereYear('birthdate', '<=', $end_year)
                           ->get();
            $title .= " ($decade - $end_year)";
        }

        return view('actors.list_by_decade', [
            "actors" => $actors, 
            "title" => $title,
            "selected_decade" => $decade
        ]);
    }

    /**
     * API: List all actors.
     */
    public function index()
    {
        $actors = Actor::all();
        return response()->json($actors);
    }

    /**
     * API: List actors by decade.
     */
    public function actorsByDecade($year)
    {
        $start_year = $year;
        $end_year = $year + 9;
        
        $actors = Actor::whereYear('birthdate', '>=', $start_year)
                       ->whereYear('birthdate', '<=', $end_year)
                       ->get();
        return response()->json($actors);
    }

    /**
     * API: Count actors.
     */
    public function countActorsApi()
    {
        $count = Actor::count();
        return response()->json(['count' => $count]);
    }

    /**
     * API: Delete actor by id.
     */
    public function destroy($id)
    {
        $actor = Actor::find($id);
        if ($actor) {
            $actor->delete();
            return response()->json(['message' => 'Actor deleted successfully']);
        }
        return response()->json(['message' => 'Actor not found'], 404);
    }
}
