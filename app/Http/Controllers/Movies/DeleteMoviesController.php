<?php

namespace App\Http\Controllers\Movies;

use App\Http\Controllers\Controller;
use App\Models\Movie;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class DeleteMoviesController extends Controller
{
    public function __invoke(string $id): JsonResponse
    {
        $movie = Movie::findOrFail($id);

        $movie->delete();

        return response()->json(status: Response::HTTP_NO_CONTENT);
    }
}
