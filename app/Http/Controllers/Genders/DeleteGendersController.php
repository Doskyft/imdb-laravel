<?php

namespace App\Http\Controllers\Genders;

use App\Http\Controllers\Controller;
use App\Models\Gender;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class DeleteGendersController extends Controller
{
    public function __invoke(Gender $gender): JsonResponse
    {
        $gender->delete();

        return response()->json(status: Response::HTTP_NO_CONTENT);
    }
}
