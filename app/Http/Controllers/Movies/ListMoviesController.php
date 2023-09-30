<?php

namespace App\Http\Controllers\Movies;

use App\Http\Controllers\Controller;
use App\Models\Movie;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class ListMoviesController extends Controller
{
    /**
     * @throws ValidationException
     */
    public function __invoke(Request $request): JsonResponse
    {
        $search = $request->query('search', []);

        $this->validateSearch($search);

        $movies = $this->createQueryBuilder($search)
            ->get()
            ->makeHidden(['actors', 'genders'])
        ;

        return response()->json([
            'items' => $movies,
            'total' => Movie::all()->count(),
        ]);
    }

    /**
     * @throws ValidationException
     */
    public function validateSearch(array $search): array
    {
        $validator = $this->getValidationFactory()->make($search, [
            'title' => 'nullable|string',
            'actor' => 'nullable|integer',
            'gender' => 'nullable|integer',
        ]);

        return $validator->validate();
    }

    private function createQueryBuilder(array $search = []): Builder
    {
        $queryBuilder = Movie::query();

        if (!empty($search['title'])) {
            $queryBuilder->where('title', 'like', "%{$search['title']}%");
        }

        if (!empty($search['actor'])) {
            $queryBuilder->whereHas('actors', function (Builder $query) use ($search) {
                $query->whereIn('actors.id', [$search['actor']]);
            });
        }

        if (!empty($search['gender'])) {
            $queryBuilder->whereHas('genders', function (Builder $query) use ($search) {
                $query->whereIn('genders.id', [$search['gender']]);
            });
        }

        return $queryBuilder;
    }
}
