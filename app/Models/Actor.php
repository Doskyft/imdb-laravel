<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @method static findOrFail(string $id)
 * @method static create(array $all)
 */
class Actor extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
    ];

    public static array $validate = [
        'first_name' => ['required', 'string'],
        'last_name' => ['required', 'string'],
    ];

    public function movies(): BelongsToMany
    {
        return $this->belongsToMany(
            related: Movie::class,
            table: 'movies_actors',
            foreignPivotKey: 'actor_id',
            relatedPivotKey: 'movie_id',
        );
    }
}
