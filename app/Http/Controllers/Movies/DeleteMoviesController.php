<?php

namespace App\Http\Controllers\Movies;

use App\Http\Controllers\Controller;
use App\Models\Movie;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class DeleteMoviesController extends Controller
{
    public function __invoke(Movie $movie): JsonResponse
    {
        $movie->delete();

        return response()->json(status: Response::HTTP_NO_CONTENT);
    }
}
