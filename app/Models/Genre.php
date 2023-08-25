<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    use HasFactory;

    protected $table='Genre';
    public $timestamps=false;

    public function MovieGenre()
    {
        return $this->hasMany(MovieGenre::class);
    }
}
