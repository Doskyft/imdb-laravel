<?php

namespace App\Http\Controllers\Actors;

use App\Http\Controllers\Controller;
use App\Models\Actor;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpFoundation\Response;

class CreateActorsController extends Controller
{
    /**
     * @throws ValidationException
     */
    public function __invoke(Request $request): JsonResponse
    {
        $this->validate($request, Actor::$validate);

        $actor = Actor::create($request->all());

        $actor->save();

        return response()->json(
            data: $actor,
            status: Response::HTTP_CREATED
        );
    }
}
