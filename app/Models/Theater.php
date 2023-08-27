<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Theater
 *
 * @property int $id
 * @property string $name
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\TimeSlot> $TimeSlot
 * @property-read int|null $time_slot_count
 * @method static \Illuminate\Database\Eloquent\Builder|Theater newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Theater newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Theater query()
 * @method static \Illuminate\Database\Eloquent\Builder|Theater whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Theater whereName($value)
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Movie> $Movie
 * @property-read int|null $movie_count
 * @mixin \Eloquent
 */
class Theater extends Model
{
    use HasFactory;
    protected $table='Theater';
    public $timestamps=false;

    public function TimeSlot()
    {
        return $this->hasMany(TimeSlot::class);
    }
    public function Movie()
    {
        return $this->hasManyThrough(Movie::class,TimeSlot::class, secondKey: 'id', secondLocalKey: 'movie_id');
    }
}
