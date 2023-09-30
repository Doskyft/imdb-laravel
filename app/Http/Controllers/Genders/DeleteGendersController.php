<?php

namespace App\Http\Controllers\Genders;

use App\Http\Controllers\Controller;
use App\Models\Gender;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class DeleteGendersController extends Controller
{
    public function __invoke(string $id): JsonResponse
    {
        $gender = Gender::findOrFail($id);

        $gender->delete();

        return response()->json(status: Response::HTTP_NO_CONTENT);
    }
}
