<?php

namespace App\Http\Controllers\Actors;

use App\Http\Controllers\Controller;
use App\Models\Actor;
use Illuminate\Http\JsonResponse;

class ShowActorsController extends Controller
{
    public function __invoke(Actor $actor): JsonResponse
    {
        return response()->json($actor);
    }
}
