<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Director
 *
 * @property int $personnel_id
 * @property int $movie_id
 * @property-read \App\Models\Movie $Movie
 * @property-read \App\Models\Personnel $Personnel
 * @method static \Illuminate\Database\Eloquent\Builder|Director newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Director newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Director query()
 * @method static \Illuminate\Database\Eloquent\Builder|Director whereMovieId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Director wherePersonnelId($value)
 * @mixin \Eloquent
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
