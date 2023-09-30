<?php

namespace App\Http\Controllers\Genders;

use App\Http\Controllers\Controller;
use App\Models\Gender;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpFoundation\Response;

class CreateGendersController extends Controller
{
    /**
     * @throws ValidationException
     */
    public function __invoke(Request $request): JsonResponse
    {
        $this->validate($request, Gender::$validate);

        $gender = Gender::create($request->all());

        $gender->save();

        return response()->json(
            data: $gender,
            status: Response::HTTP_CREATED
        );
    }
}
