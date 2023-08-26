<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\MovieGenre
 *
 * @property int $genre_id
 * @property int $movie_id
 * @property-read \App\Models\Genre $Genre
 * @property-read \App\Models\Movie $Movie
 * @method static \Illuminate\Database\Eloquent\Builder|MovieGenre newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MovieGenre newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MovieGenre query()
 * @method static \Illuminate\Database\Eloquent\Builder|MovieGenre whereGenreId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MovieGenre whereMovieId($value)
 * @mixin \Eloquent
 */
class MovieGenre extends Model
{
    use HasFactory;
    protected $table='MovieGenre';
    public $timestamps=false;

    public function Genre()
    {
        return $this->belongsTo(Genre::class);
    }
    public function Movie()
    {
        return $this->belongsTo(Movie::class);
    }
}
