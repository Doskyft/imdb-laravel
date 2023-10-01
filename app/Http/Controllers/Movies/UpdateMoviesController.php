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
    public function __invoke(Movie $movie, Request $request): JsonResponse
    {
        $this->validate($request, Movie::$validate);

        $movie->actors()->sync($request->get('actors'));
        $movie->genders()->sync($request->get('genders'));

        $movie->update($request->all());

        return response()->json(
            data: $movie->refresh(),
            status: Response::HTTP_OK,
        );
    }
}
