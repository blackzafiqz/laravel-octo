<?php

namespace App\Models;

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
 * @property-read \App\Models\Movie $Movie
 * @property-read \App\Models\User $User
 * @method static \Illuminate\Database\Eloquent\Builder|Rating newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Rating newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Rating query()
 * @method static \Illuminate\Database\Eloquent\Builder|Rating whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rating whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rating whereMovieId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rating whereRating($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rating whereUserId($value)
 * @mixin \Eloquent
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
