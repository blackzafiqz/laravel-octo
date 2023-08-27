<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;


/**
 * App\Models\Movie
 *
 * @property int $id
 * @property string $title
 * @property string $release
 * @property int $length
 * @property string $description
 * @property string $mpaa_rating
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Director> $Director
 * @property-read int|null $director_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\MovieGenre> $MovieGenre
 * @property-read int|null $movie_genre_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\MovieLanguage> $MovieLanguage
 * @property-read int|null $movie_language_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Performer> $Performer
 * @property-read int|null $performer_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\TimeSlot> $TimeSlot
 * @property-read int|null $time_slot_count
 * @method static \Illuminate\Database\Eloquent\Builder|Movie newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Movie newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Movie query()
 * @method static \Illuminate\Database\Eloquent\Builder|Movie whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Movie whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Movie whereLength($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Movie whereMpaaRating($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Movie whereRelease($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Movie whereTitle($value)
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Rating> $Rating
 * @property-read int|null $rating_count
 * @mixin \Eloquent
 */
class Movie extends Model
{
    use HasFactory;
    protected $table='Movie';
    public $timestamps=false;

    public function Director()
    {
        return $this->hasMany(Director::class);
    }
    public function Performer()
    {
        return $this->hasMany(Performer::class);
    }
    public function MovieLanguage()
    {
        return $this->hasMany(MovieLanguage::class);
    }
    public function MovieGenre()
    {
        return $this->hasMany(MovieGenre::class);
    }
    public function TimeSlot(): HasMany
    {
        return $this->hasMany(TimeSlot::class);
    }
    public function Rating(): HasMany
    {
        return $this->hasMany(Rating::class);
    }
}
