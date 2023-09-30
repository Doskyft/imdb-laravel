<?php

namespace App\Http\Controllers\Genders;

use App\Http\Controllers\Controller;
use App\Models\Gender;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ListGendersController extends Controller
{
    public function __invoke(Request $request): JsonResponse
    {
        $limit = (int) ($request->limit ?: 20);
        $page = (int) ($request->page && $request->page > 0 ? $request->page : 1);
        $skip = ($page - 1) * $limit;

        $genders = Gender::query()
            ->skip($skip)
            ->take($limit)
            ->get()
        ;

        $total = Gender::all()->count();

        return response()->json([
            'items' => $genders,
            'total' => $total,
            'limit' => $limit,
            'page' => $page,
            'has_more' => $total > $page * $limit,
        ]);
    }
}
