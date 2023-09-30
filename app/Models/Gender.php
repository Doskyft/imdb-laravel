<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @method static findOrFail(string $id): Gender
 * @method static create($all): Gender
 */
class Gender extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
    ];

    public static array $validate = [
        'name' => ['required', 'string', 'max:255'],
    ];

    public function movies(): BelongsToMany
    {
        return $this->belongsToMany(
            related: Movie::class,
            table: 'movies_genders',
            foreignPivotKey: 'gender_id',
            relatedPivotKey: 'movie_id',
        );
    }
}
