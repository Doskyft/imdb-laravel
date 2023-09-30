<?php

namespace App\Http\Controllers\Movies;

use App\Http\Controllers\Controller;
use App\Models\Movie;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpFoundation\Response;

class UpdateMoviesController extends Controller
{
    /**
     * @throws ValidationException
     */
    public function __invoke(string $id, Request $request): JsonResponse
    {
        $movie = Movie::findOrFail($id);

        $this->validate($request, Movie::$validate);

        $movie->update($request->all());

        return response()->json(
            data: $request,
            status: Response::HTTP_OK,
        );
    }
}
