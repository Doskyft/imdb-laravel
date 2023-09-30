<?php

namespace App\Http\Controllers\Genders;

use App\Http\Controllers\Controller;
use App\Models\Gender;
use App\Models\Movie;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class ShowGendersController extends Controller
{
    public function __invoke(string $id): JsonResponse
    {
        return response()->json(Gender::findOrFail($id));
    }
}
