<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MovieGenre extends Model
{
    use HasFactory;
    protected $table='MovieGenre';
    public $timestamps=false;

    public function Genre()
    {
        return $this->belongsTo(Genre::class);
    }
    public function Movie()
    {
        return $this->belongsTo(Movie::class);
    }
}
