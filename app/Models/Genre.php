<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Genre
 *
 * @property int $id
 * @property string $name
 * @property-read Collection<int, MovieGenre> $MovieGenre
 * @property-read int|null $movie_genre_count
 * @method static Builder|Genre newModelQuery()
 * @method static Builder|Genre newQuery()
 * @method static Builder|Genre query()
 * @method static Builder|Genre whereId($value)
 * @method static Builder|Genre whereName($value)
 * @property-read Collection<int, Movie> $Movie
 * @property-read int|null $movie_count
 * @mixin Eloquent
 */
class Genre extends Model
{
    use HasFactory;

    protected $table='Genre';
    public $timestamps=false;

    public function MovieGenre()
    {
        return $this->hasMany(MovieGenre::class);
    }
    public function Movie()
    {
        return $this->hasManyThrough(Movie::class,MovieGenre::class, secondKey: 'id', secondLocalKey: 'movie_id');
    }
}
