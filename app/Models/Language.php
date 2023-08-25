<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    use HasFactory;
    protected $table='Language';
    public $timestamps=false;

    public function MovieLanguage()
    {
        return $this->hasMany(Language::class);
    }
}
