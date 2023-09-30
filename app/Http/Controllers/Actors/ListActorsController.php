<?php

namespace App\Http\Controllers\Actors;

use App\Http\Controllers\Controller;
use App\Models\Actor;
use Illuminate\Http\JsonResponse;

class ListActorsController extends Controller
{
    public function __invoke(): JsonResponse
    {
        return response()->json([
            'items' => Actor::all(),
            'total' => Actor::all()->count(),
        ]);
    }
}
