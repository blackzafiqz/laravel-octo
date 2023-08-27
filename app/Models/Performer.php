<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Performer
 *
 * @property int $personnel_id
 * @property int $movie_id
 * @property-read Movie $Movie
 * @property-read Personnel $Personnel
 * @method static Builder|Performer newModelQuery()
 * @method static Builder|Performer newQuery()
 * @method static Builder|Performer query()
 * @method static Builder|Performer whereMovieId($value)
 * @method static Builder|Performer wherePersonnelId($value)
 * @mixin Eloquent
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
