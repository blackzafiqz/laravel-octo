<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\User
 *
 * @property int $id
 * @property string $username
 * @property-read Collection<int, Rating> $Rating
 * @property-read int|null $rating_count
 * @method static Builder|User newModelQuery()
 * @method static Builder|User newQuery()
 * @method static Builder|User query()
 * @method static Builder|User whereId($value)
 * @method static Builder|User whereUsername($value)
 * @mixin Eloquent
 */
class User extends Model
{
    use HasFactory;
    protected $table = "User";
    public $timestamps=false;

    public function Rating()
    {
        return $this->hasMany(Rating::class);
    }

}
