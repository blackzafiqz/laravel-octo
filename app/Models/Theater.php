<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Theater extends Model
{
    use HasFactory;
    protected $table='Theater';
    public $timestamps=false;

    public function TimeSlot()
    {
        return $this->hasMany(TimeSlot::class);
    }
}
