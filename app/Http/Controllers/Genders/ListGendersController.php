<?php

namespace App\Http\Controllers\Genders;

use App\Http\Controllers\Controller;
use App\Models\Gender;
use Illuminate\Http\JsonResponse;

class ListGendersController extends Controller
{
    public function __invoke(): JsonResponse
    {
        return response()->json([
            'items' => Gender::all(),
            'total' => Gender::all()->count()
        ]);
    }
}
