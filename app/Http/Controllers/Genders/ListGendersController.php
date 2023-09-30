<?php

namespace App\Http\Controllers\Genders;

use App\Http\Controllers\Controller;
use App\Models\Gender;
use Illuminate\Http\JsonResponse;

class ListGendersController extends Controller
{
    public function __invoke(): JsonResponse
    {
        $genders = Gender::all();

        return response()->json([
            'items' => $genders,
            'total' => count($genders),
        ]);
    }
}
