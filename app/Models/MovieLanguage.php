<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Lang;

/**
 * App\Models\MovieLanguage
 *
 * @property int $language_id
 * @property int $movie_id
 * @property-read \App\Models\Language $Language
 * @property-read \App\Models\Movie $Movie
 * @method static \Illuminate\Database\Eloquent\Builder|MovieLanguage newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MovieLanguage newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MovieLanguage query()
 * @method static \Illuminate\Database\Eloquent\Builder|MovieLanguage whereLanguageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MovieLanguage whereMovieId($value)
 * @mixin \Eloquent
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
