<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Personnel
 *
 * @property int $id
 * @property string $name
 * @property-read Director|null $Director
 * @property-read Collection<int, Performer> $Performer
 * @property-read int|null $performer_count
 * @method static Builder|Personnel newModelQuery()
 * @method static Builder|Personnel newQuery()
 * @method static Builder|Personnel query()
 * @method static Builder|Personnel whereId($value)
 * @method static Builder|Personnel whereName($value)
 * @property-read Collection<int, Movie> $MoviePerformer
 * @property-read int|null $movie_performer_count
 * @mixin Eloquent
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
