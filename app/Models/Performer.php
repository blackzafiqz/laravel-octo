<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Performer
 *
 * @property int $personnel_id
 * @property int $movie_id
 * @property-read \App\Models\Movie $Movie
 * @property-read \App\Models\Personnel $Personnel
 * @method static \Illuminate\Database\Eloquent\Builder|Performer newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Performer newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Performer query()
 * @method static \Illuminate\Database\Eloquent\Builder|Performer whereMovieId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Performer wherePersonnelId($value)
 * @mixin \Eloquent
 */
class Performer extends Model
{
    use HasFactory;
    protected $table='Performer';
    public $timestamps=false;

    public function Personnel()
    {
        return $this->belongsTo(Personnel::class);
    }
    public function Movie()
    {
        return $this->belongsTo(Movie::class);
    }
}
