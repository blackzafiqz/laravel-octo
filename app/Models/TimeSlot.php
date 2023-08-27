<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\TimeSlot
 *
 * @property int $id
 * @property string $time_start
 * @property int $movie_id
 * @property int $theater_id
 * @property int $room
 * @property-read Movie $Movie
 * @property-read Theater $Theater
 * @method static Builder|TimeSlot newModelQuery()
 * @method static Builder|TimeSlot newQuery()
 * @method static Builder|TimeSlot query()
 * @method static Builder|TimeSlot whereId($value)
 * @method static Builder|TimeSlot whereMovieId($value)
 * @method static Builder|TimeSlot whereTheaterId($value)
 * @method static Builder|TimeSlot whereTimeStart($value)
 * @method static Builder|TimeSlot whereRoom($value)
 * @mixin Eloquent
 */
class TimeSlot extends Model
{
    use HasFactory;
    protected $table='TimeSlot';
    public $timestamps=false;

    public function Theater()
    {
        return $this->belongsTo(Theater::class);
    }

    public function Movie()
    {
        return $this->belongsTo(Movie::class);
    }
}
