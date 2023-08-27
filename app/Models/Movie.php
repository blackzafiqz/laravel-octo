<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
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
 * @property-read Collection<int, Director> $Director
 * @property-read int|null $director_count
 * @property-read Collection<int, MovieGenre> $MovieGenre
 * @property-read int|null $movie_genre_count
 * @property-read Collection<int, MovieLanguage> $MovieLanguage
 * @property-read int|null $movie_language_count
 * @property-read Collection<int, Performer> $Performer
 * @property-read int|null $performer_count
 * @property-read Collection<int, TimeSlot> $TimeSlot
 * @property-read int|null $time_slot_count
 * @method static Builder|Movie newModelQuery()
 * @method static Builder|Movie newQuery()
 * @method static Builder|Movie query()
 * @method static Builder|Movie whereDescription($value)
 * @method static Builder|Movie whereId($value)
 * @method static Builder|Movie whereLength($value)
 * @method static Builder|Movie whereMpaaRating($value)
 * @method static Builder|Movie whereRelease($value)
 * @method static Builder|Movie whereTitle($value)
 * @property-read Collection<int, Rating> $Rating
 * @property-read int|null $rating_count
 * @mixin Eloquent
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
