<?php

namespace App\Http\Controllers\Genders;

use App\Http\Controllers\Controller;
use App\Models\Gender;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpFoundation\Response;

class UpdateGendersController extends Controller
{
    /**
     * @throws ValidationException
     */
    public function __invoke(string $id, Request $request): JsonResponse
    {
        $movie = Gender::findOrFail($id);

        $this->validate($request, Gender::$validate);

        $movie->update($request->all());

        return response()->json(
            data: $request,
            status: Response::HTTP_OK,
        );
    }
}
