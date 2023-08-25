<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
    public function TimeSlot()
    {
        return $this->hasMany(TimeSlot::class);
    }
}
