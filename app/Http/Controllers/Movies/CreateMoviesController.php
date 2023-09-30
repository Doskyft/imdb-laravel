<?php

namespace App\Http\Controllers\Movies;

use App\Http\Controllers\Controller;
use App\Models\Movie;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpFoundation\Response;

class CreateMoviesController extends Controller
{
    /**
     * @throws ValidationException
     */
    public function __invoke(Request $request): JsonResponse
    {
        $this->validate($request, Movie::$validate);

        $movie = Movie::create($request->all());

        $movie->actors()->sync($request->get('actors'));
        $movie->genders()->sync($request->get('genders'));

        $movie->save();

        return response()->json(
            data: Movie::findOrFail($movie->id),
            status: Response::HTTP_CREATED
        );
    }
}
