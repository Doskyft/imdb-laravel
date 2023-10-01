<?php

namespace App\Http\Controllers\Movies;

use App\Http\Controllers\Controller;
use App\Models\Gender;
use App\Models\Movie;
use Illuminate\Http\JsonResponse;

class ShowMoviesController extends Controller
{
    public function __invoke(Gender $gender): JsonResponse
    {
        return response()->json($gender);
    }
}
