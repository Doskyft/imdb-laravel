<?php

namespace App\Http\Controllers\Actors;

use App\Http\Controllers\Controller;
use App\Models\Actor;
use Illuminate\Http\JsonResponse;

class ShowActorsController extends Controller
{
    public function __invoke(string $id): JsonResponse
    {
        return response()->json(Actor::findOrFail($id));
    }
}
