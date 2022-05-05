<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    public function show(Request $request)
    {
        $genre = Genre::find($request->id);
        $films = $genre->films()->paginate(20);
        return view(
            'genre',
            [
                'genre' => $genre,
                'films' => $films,
            ]
        );
    }
}
