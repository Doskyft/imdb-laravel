<?php

use App\Http\Controllers\Actors\CreateActorsController;
use App\Http\Controllers\Actors\DeleteActorsController;
use App\Http\Controllers\Actors\ListActorsController;
use App\Http\Controllers\Actors\ShowActorsController;
use App\Http\Controllers\Actors\UpdateActorsController;
use App\Http\Controllers\Genders\CreateGendersController;
use App\Http\Controllers\Genders\DeleteGendersController;
use App\Http\Controllers\Genders\ListGendersController;
use App\Http\Controllers\Genders\ShowGendersController;
use App\Http\Controllers\Genders\UpdateGendersController;
use App\Http\Controllers\Movies\CreateMoviesController;
use App\Http\Controllers\Movies\DeleteMoviesController;
use App\Http\Controllers\Movies\ListMoviesController;
use App\Http\Controllers\Movies\ShowMoviesController;
use App\Http\Controllers\Movies\UpdateMoviesController;
use App\Http\Middleware\ApiKeyAuthMiddleware;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware([ApiKeyAuthMiddleware::class])->group(function () {
    Route::get('/movies', ListMoviesController::class)
        ->can('viewAny', App\Models\Movie::class)
    ;
    Route::get('/movies/{movie}', ShowMoviesController::class)
        ->can('view', 'movie')
    ;
    Route::post('/movies', CreateMoviesController::class)
        ->can('create', App\Models\Movie::class)
    ;
    Route::put('/movies/{movie}', UpdateMoviesController::class)
        ->can('update', 'movie')
    ;
    Route::delete('/movies/{movie}', DeleteMoviesController::class)
        ->can('delete', 'movie')
    ;

    Route::get('/actors', ListActorsController::class)
        ->can('viewAny', App\Models\Actor::class)
    ;
    Route::get('/actors/{actor}', ShowActorsController::class)
        ->can('view', 'actor')
    ;
    Route::post('/actors', CreateActorsController::class)
        ->can('create', App\Models\Actor::class)
    ;
    Route::put('/actors/{actor}', UpdateActorsController::class)
        ->can('update', 'actor')
    ;
    Route::delete('/actors/{actor}', DeleteActorsController::class)
        ->can('delete', 'actor')
    ;

    Route::get('/genders', ListGendersController::class)
        ->can('viewAny', App\Models\Gender::class)
    ;
    Route::get('/genders/{gender}', ShowGendersController::class)
        ->can('view', 'gender')
    ;
    Route::post('/genders', CreateGendersController::class)
        ->can('create', App\Models\Gender::class)
    ;
    Route::put('/genders/{gender}', UpdateGendersController::class)
        ->can('update', 'gender')
    ;
    Route::delete('/genders/{gender}', DeleteGendersController::class)
        ->can('delete', 'gender')
    ;
});
