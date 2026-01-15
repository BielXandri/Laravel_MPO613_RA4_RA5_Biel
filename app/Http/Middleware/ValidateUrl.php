<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ValidateUrl
{
    //Comprobamos que la url de la pelicula es correcta
    public function handle(Request $request, Closure $next)
    {
        if (!$request->is('film*') && !$request->is('/')) {
            
            return redirect('/')
                ->with('error', 'Acceso denegado: La URL solicitada no es válida.');
        }

        return $next($request);
    }
}
