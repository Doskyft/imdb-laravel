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
    Route::get('/movies', ListMoviesController::class);
    Route::get('/movies/{id}', ShowMoviesController::class);
    Route::post('/movies', CreateMoviesController::class);
    Route::put('/movies/{id}', UpdateMoviesController::class);
    Route::delete('/movies/{id}', DeleteMoviesController::class);

    Route::get('/actors', ListActorsController::class);
    Route::get('/actors/{id}', ShowActorsController::class);
    Route::post('/actors', CreateActorsController::class);
    Route::put('/actors/{id}', UpdateActorsController::class);
    Route::delete('/actors/{id}', DeleteActorsController::class);

    Route::get('/genders', ListGendersController::class);
    Route::get('/genders/{id}', ShowGendersController::class);
    Route::post('/genders', CreateGendersController::class);
    Route::put('/genders/{id}', UpdateGendersController::class);
    Route::delete('/genders/{id}', DeleteGendersController::class);

});
