<?php

namespace App\Http\Controllers;

use App\Models\Distributeur;
use Illuminate\Http\Request;

class DistributeurController extends Controller
{
    public function show(Request $request)
    {
        $distributeur = Distributeur::find($request->id);
        $films = $distributeur->films()->paginate(20);
        return view(
            'distributeur',
            [
                'distributeur' => $distributeur,
                'films' => $films,
            ]
        );
    }
}
