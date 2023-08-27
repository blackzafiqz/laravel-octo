<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\MovieGenre
 *
 * @property int $genre_id
 * @property int $movie_id
 * @property-read Genre $Genre
 * @property-read Movie $Movie
 * @method static Builder|MovieGenre newModelQuery()
 * @method static Builder|MovieGenre newQuery()
 * @method static Builder|MovieGenre query()
 * @method static Builder|MovieGenre whereGenreId($value)
 * @method static Builder|MovieGenre whereMovieId($value)
 * @mixin Eloquent
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
