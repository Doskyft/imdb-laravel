<?php

namespace App\Http\Controllers\Movies;

use App\Http\Controllers\Controller;
use App\Models\Movie;
use Illuminate\Http\JsonResponse;

class ShowMoviesController extends Controller
{
    public function __invoke(string $id): JsonResponse
    {
        return response()->json(Movie::findOrFail($id));
    }
}
