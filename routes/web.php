<?php

use App\Http\Controllers\FilmController;
use App\Http\Middleware\ValidateYear;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('year')->group(function() {
    Route::group(['prefix'=>'filmout'], function(){
        // Routes included with prefix "filmout"
        Route::get('oldFilms/{year?}',[FilmController::class, "listOldFilms"])->name('oldFilms');
        Route::get('newFilms/{year?}',[FilmController::class, "listNewFilms"])->name('newFilms');

        Route::get('filmsByYear/{year?}',[FilmController::class, "listFilmsByYear"])->name('filmsByYear');
        Route::get('filmsByGenre/{genre?}',[FilmController::class, "listFilmsByGenre"])->name('filmsByGenre');
        Route::get('sortFilms', [FilmController::class, "sortFilmsByYear"])->name('sortFilms');
        
        // Esta es la ruta para mostrar la página (GET)
        Route::get('count', [FilmController::class, "countFilms"])->name('countFilmsForm');
        
        // Esta es la ruta que recibe el formulario (POST)
        Route::post('count', [FilmController::class, "countFilms"])->name('countFilms');
    });
});

//Ruta balidar URL
Route::middleware(['validate.url'])->group(function () {
    Route::get('/filmout/oldFilms', [FilmController::class, 'oldFilms']);
    Route::get('/filmout/newFilms', [FilmController::class, 'newFilms']);
});

Route::prefix('actorout')->group(function () {
    Route::get('actors', [\App\Http\Controllers\ActorController::class, 'listActors'])->name('actors');
    Route::get('actorsByDecade', [\App\Http\Controllers\ActorController::class, 'listActorsByDecade'])->name('actorsByDecade');
    Route::get('count', [\App\Http\Controllers\ActorController::class, 'countActors'])->name('countActorsForm');
    Route::post('count', [\App\Http\Controllers\ActorController::class, 'countActors'])->name('countActors');
    Route::get('delete', [\App\Http\Controllers\ActorController::class, 'deleteActors'])->name('deleteActorsForm');
    Route::post('delete', [\App\Http\Controllers\ActorController::class, 'deleteActors'])->name('deleteActors');
});

Route::prefix('filmin')->group(function () {
    Route::post('/add-film', [FilmController::class, 'createFilm'])
        ->name('filmin.addFilm');
});