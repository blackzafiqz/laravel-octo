<?php

namespace App\Models;

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
 * @property-read \App\Models\Movie $Movie
 * @property-read \App\Models\Theater $Theater
 * @method static \Illuminate\Database\Eloquent\Builder|TimeSlot newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TimeSlot newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TimeSlot query()
 * @method static \Illuminate\Database\Eloquent\Builder|TimeSlot whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TimeSlot whereMovieId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TimeSlot whereTheaterId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TimeSlot whereTimeStart($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TimeSlot whereRoom($value)
 * @mixin \Eloquent
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
