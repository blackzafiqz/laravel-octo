<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Genre
 *
 * @property int $id
 * @property string $name
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\MovieGenre> $MovieGenre
 * @property-read int|null $movie_genre_count
 * @method static \Illuminate\Database\Eloquent\Builder|Genre newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Genre newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Genre query()
 * @method static \Illuminate\Database\Eloquent\Builder|Genre whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Genre whereName($value)
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Movie> $Movie
 * @property-read int|null $movie_count
 * @mixin \Eloquent
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
