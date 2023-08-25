<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Lang;

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
