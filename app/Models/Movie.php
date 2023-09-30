<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @method static Movie create(array $array)
 * @method static Movie findOrFail(mixed $id, $columns = ['*'])
 */
class Movie extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'synopsis',
        'release_year',
        'duration', // in seconds
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'release_year' => 'int',
        'duration' => 'int',
    ];

    public static array $validate = [
        'title' => ['required', 'max:100'],
        'synopsis' => ['required'],
        'release_year' => ['required', 'numeric', 'min:0'],
        'duration' => ['required'],
    ];

    protected $with = [
        'actors',
        'genders',
    ];

    public function actors(): BelongsToMany
    {
        return $this->belongsToMany(
            related: Actor::class,
            table: 'movies_actors',
            foreignPivotKey: 'movie_id',
            relatedPivotKey: 'actor_id',
        );
    }

    public function genders(): BelongsToMany
    {
        return $this->belongsToMany(
            related: Gender::class,
            table: 'movies_genders',
            foreignPivotKey: 'movie_id',
            relatedPivotKey: 'gender_id',
        );
    }
}
