<?php

namespace App\Http\Controllers\Actors;

use App\Http\Controllers\Controller;
use App\Models\Actor;
use Illuminate\Http\JsonResponse;

class ListActorsController extends Controller
{
    public function __invoke(): JsonResponse
    {
        $actors = Actor::all();

        return response()->json([
            'items' => $actors,
            'total' => $actors->count(),
        ]);
    }
}
