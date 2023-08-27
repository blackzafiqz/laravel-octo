<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Language
 *
 * @property int $id
 * @property string $name
 * @property-read Collection<int, Language> $MovieLanguage
 * @property-read int|null $movie_language_count
 * @method static Builder|Language newModelQuery()
 * @method static Builder|Language newQuery()
 * @method static Builder|Language query()
 * @method static Builder|Language whereId($value)
 * @method static Builder|Language whereName($value)
 * @mixin Eloquent
 */
class Language extends Model
{
    use HasFactory;
    protected $table='Language';
    public $timestamps=false;

    public function MovieLanguage()
    {
        return $this->hasMany(Language::class);
    }
}
