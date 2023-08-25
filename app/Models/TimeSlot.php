<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TimeSlot extends Model
{
    use HasFactory;
    protected $table='TimeSlot';
    public $timestamps=false;

    public function Theater()
    {
        return $this->belongsTo(Theater::class);
    }

    public function Movie()
    {
        return $this->belongsTo(Movie::class);
    }
}
