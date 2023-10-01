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
        ->middleware('can:viewAny,'.App\Models\Movie::class)
    ;
    Route::get('/movies/{id}', ShowMoviesController::class)
        ->middleware('can:view,'.App\Models\Movie::class)
    ;
    Route::post('/movies', CreateMoviesController::class)
        ->middleware('can:create,'.App\Models\Movie::class)
    ;
    Route::put('/movies/{id}', UpdateMoviesController::class)
        ->middleware('can:update,'.App\Models\Movie::class)
    ;
    Route::delete('/movies/{id}', DeleteMoviesController::class)
        ->middleware('can:delete,'.App\Models\Movie::class)
    ;

    Route::get('/actors', ListActorsController::class)
        ->middleware('can:viewAny,'.App\Models\Actor::class)
    ;
    Route::get('/actors/{id}', ShowActorsController::class)
        ->middleware('can:view,'.App\Models\Actor::class)
    ;
    Route::post('/actors', CreateActorsController::class)
        ->middleware('can:create,'.App\Models\Actor::class)
    ;
    Route::put('/actors/{id}', UpdateActorsController::class)
        ->middleware('can:update,'.App\Models\Actor::class)
    ;
    Route::delete('/actors/{id}', DeleteActorsController::class)
        ->middleware('can:delete,'.App\Models\Actor::class)
    ;

    Route::get('/genders', ListGendersController::class)
        ->middleware('can:viewAny,'.App\Models\Gender::class)
    ;
    Route::get('/genders/{id}', ShowGendersController::class)
        ->middleware('can:view,'.App\Models\Gender::class)
    ;
    Route::post('/genders', CreateGendersController::class)
        ->middleware('can:create,'.App\Models\Gender::class)
    ;
    Route::put('/genders/{id}', UpdateGendersController::class)
        ->middleware('can:update,'.App\Models\Gender::class)
    ;
    Route::delete('/genders/{id}', DeleteGendersController::class)
        ->middleware('can:delete,'.App\Models\Gender::class)
    ;
});
