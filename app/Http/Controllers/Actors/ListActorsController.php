<?php

namespace App\Http\Controllers\Actors;

use App\Http\Controllers\Controller;
use App\Models\Actor;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ListActorsController extends Controller
{
    public function __invoke(Request $request): JsonResponse
    {
        $limit = (int) ($request->limit ?: 20);
        $page = (int) ($request->page && $request->page > 0 ? $request->page : 1);
        $skip = ($page - 1) * $limit;

        $actors = Actor::query()
            ->skip($skip)
            ->take($limit)
            ->get()
        ;

        $total = Actor::all()->count();

        return response()->json([
            'items' => $actors,
            'total' => $total,
            'limit' => $limit,
            'page' => $page,
            'has_more' => $total > $page * $limit,
        ]);
    }
}
