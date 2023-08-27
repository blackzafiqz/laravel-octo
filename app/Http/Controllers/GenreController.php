<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Models\Movie;
use App\Models\MovieGenre;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Date;
use function Sodium\add;


class GenreController extends Controller
{
    public function create(Request $request)
    {
        $genre = new Genre();
        $genre->name = $request->name;
        $genre->save();
    }

}
