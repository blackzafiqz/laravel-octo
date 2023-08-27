<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Lang;

/**
 * App\Models\MovieLanguage
 *
 * @property int $language_id
 * @property int $movie_id
 * @property-read Language $Language
 * @property-read Movie $Movie
 * @method static Builder|MovieLanguage newModelQuery()
 * @method static Builder|MovieLanguage newQuery()
 * @method static Builder|MovieLanguage query()
 * @method static Builder|MovieLanguage whereLanguageId($value)
 * @method static Builder|MovieLanguage whereMovieId($value)
 * @mixin Eloquent
 */
class MovieLanguage extends Model
{
    use HasFactory;
    protected $table='MovieLanguage';
    public $timestamps=false;

    public function Language()
    {
        return $this->belongsTo(Language::class);
    }
    public function Movie()
    {
        return $this->belongsTo(Movie::class);
    }
}
