<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    public function store(Request $request)
    {
        $genre = new Genre();
        $genre->name = $request->name;
        $genre->save();
    }
}
