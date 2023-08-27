<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Rating
 *
 * @property int $id
 * @property int $rating
 * @property string $description
 * @property int $user_id
 * @property int $movie_id
 * @property-read Movie $Movie
 * @property-read User $User
 * @method static Builder|Rating newModelQuery()
 * @method static Builder|Rating newQuery()
 * @method static Builder|Rating query()
 * @method static Builder|Rating whereDescription($value)
 * @method static Builder|Rating whereId($value)
 * @method static Builder|Rating whereMovieId($value)
 * @method static Builder|Rating whereRating($value)
 * @method static Builder|Rating whereUserId($value)
 * @mixin Eloquent
 */
class Rating extends Model
{
    use HasFactory;
    protected $table='Rating';
    public $timestamps=false;

    public function User()
    {
        return $this->belongsTo(User::class);
    }
    public function Movie()
    {
        return $this->belongsTo(Movie::class);
    }
}
