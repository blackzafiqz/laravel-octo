<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personnel extends Model
{
    use HasFactory;
    protected $table='Personnel';
    public $timestamps=false;

    public function Performer()
    {
        return $this->hasMany(Performer::class);
    }
    public function Director()
    {
        return $this->belongsTo(Director::class);
    }
}
