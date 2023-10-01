<?php

namespace App\Http\Controllers\Actors;

use App\Http\Controllers\Controller;
use App\Models\Actor;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpFoundation\Response;

class UpdateActorsController extends Controller
{
    /**
     * @throws ValidationException
     */
    public function __invoke(Actor $actor, Request $request): JsonResponse
    {
        $this->validate($request, Actor::$validate);

        $actor->update($request->all());

        return response()->json(
            data: $actor->refresh(),
            status: Response::HTTP_OK,
        );
    }
}
