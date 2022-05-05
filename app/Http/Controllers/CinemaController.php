<?php

namespace App\Http\Controllers;

use App\Models\Film;
use App\Models\Genre;
use Illuminate\Http\Request;

class CinemaController extends Controller
{
    public function index(?Request $request)
    {
        if (!empty($request->distributeur)) {
            $films = Film::whereNotNull('id_distributeur')->paginate(5);
            return view(
                'films',
                [
                    'films' => $films,
                    'distributeur' => true
                ]
            );
        } else {
            $films = Film::paginate(5);
            return view(
                'films',
                [
                    'films' => $films,
                    'distributeur' => false
                ]
            );
        }
    }

    public function show(Request $request)
    {
        $film = Film::find($request->id);
        return view(
            'film',
            [
                'film' => $film,
            ]
        );
    }
}
