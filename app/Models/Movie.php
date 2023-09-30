<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

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
