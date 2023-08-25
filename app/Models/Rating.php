<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;
    protected $table='Rating';
    public $timestamps=false;

    public function User()
    {
        return $this->belongsTo(User::class);
    }
    public function Movie()
    {
        return $this->belongsTo(Movie::class);
    }
}
