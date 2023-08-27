<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Theater
 *
 * @property int $id
 * @property string $name
 * @property-read Collection<int, TimeSlot> $TimeSlot
 * @property-read int|null $time_slot_count
 * @method static Builder|Theater newModelQuery()
 * @method static Builder|Theater newQuery()
 * @method static Builder|Theater query()
 * @method static Builder|Theater whereId($value)
 * @method static Builder|Theater whereName($value)
 * @property-read Collection<int, Movie> $Movie
 * @property-read int|null $movie_count
 * @mixin Eloquent
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
