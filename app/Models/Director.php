<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Director
 *
 * @property int $personnel_id
 * @property int $movie_id
 * @property-read Movie $Movie
 * @property-read Personnel $Personnel
 * @method static Builder|Director newModelQuery()
 * @method static Builder|Director newQuery()
 * @method static Builder|Director query()
 * @method static Builder|Director whereMovieId($value)
 * @method static Builder|Director wherePersonnelId($value)
 * @mixin Eloquent
 */
class Director extends Model
{
    use HasFactory;

    protected $table = 'Director';
    public $timestamps = false;

    public function Movie()
    {
        return $this->belongsTo(Movie::class);
    }

    public function Personnel()
    {
        return $this->belongsTo(Personnel::class);
    }
}
