<?php

namespace App\Http\Controllers\Actors;

use App\Http\Controllers\Controller;
use App\Models\Actor;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class DeleteActorsController extends Controller
{
    public function __invoke(string $id): JsonResponse
    {
        $actor = Actor::findOrFail($id);

        $actor->delete();

        return response()->json(status: Response::HTTP_NO_CONTENT);
    }
}
