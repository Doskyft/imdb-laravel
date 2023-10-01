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
    public function __invoke(Gender $gender, Request $request): JsonResponse
    {
        $this->validate($request, Gender::$validate);

        $gender->update($request->all());

        return response()->json(
            data: $gender->refresh(),
            status: Response::HTTP_OK,
        );
    }
}
