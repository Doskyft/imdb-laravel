<?php

namespace App\Http\Controllers\Actors;

use App\Http\Controllers\Controller;
use App\Models\Actor;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class DeleteActorsController extends Controller
{
    public function __invoke(Actor $actor): JsonResponse
    {
        $actor->delete();

        return response()->json(status: Response::HTTP_NO_CONTENT);
    }
}
