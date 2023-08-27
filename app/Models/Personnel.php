<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Personnel
 *
 * @property int $id
 * @property string $name
 * @property-read \App\Models\Director|null $Director
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Performer> $Performer
 * @property-read int|null $performer_count
 * @method static \Illuminate\Database\Eloquent\Builder|Personnel newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Personnel newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Personnel query()
 * @method static \Illuminate\Database\Eloquent\Builder|Personnel whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Personnel whereName($value)
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Movie> $MoviePerformer
 * @property-read int|null $movie_performer_count
 * @mixin \Eloquent
 */
class Personnel extends Model
{
    use HasFactory;
    protected $table='Personnel';
    public $timestamps=false;

    public function Performer()
    {
        return $this->hasMany(Performer::class,'personnel_id');
    }
    public function Director()
    {
        return $this->belongsTo(Director::class);
    }
}
