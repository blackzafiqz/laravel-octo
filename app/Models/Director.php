<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Director extends Model
{
    use HasFactory;

    protected $table = 'Director';
    public $timestamps = false;

    public function Movie()
    {
        return $this->belongsTo(Movie::class);
    }

    public function Personnel()
    {
        return $this->belongsTo(Personnel::class);
    }
}
