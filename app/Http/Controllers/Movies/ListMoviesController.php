<?php

namespace App\Http\Controllers\Movies;

use App\Http\Controllers\Controller;
use App\Models\Movie;
use Illuminate\Http\JsonResponse;

class ListMoviesController extends Controller
{
    public function __invoke(): JsonResponse
    {
        $movies = Movie::all();

        return response()->json([
            'items' => $movies->makeHidden(['actors', 'genders']),
            'total' => $movies->count(),
        ]);
    }
}
