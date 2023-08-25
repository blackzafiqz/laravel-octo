<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Performer extends Model
{
    use HasFactory;
    protected $table='Performer';
    public $timestamps=false;

    public function Personnel()
    {
        return $this->belongsTo(Personnel::class);
    }
    public function Movie()
    {
        return $this->belongsTo(Movie::class);
    }
}
