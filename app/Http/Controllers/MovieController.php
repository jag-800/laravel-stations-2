<?php

namespace App\Http\Controllers;
use App\Models\Movie;

class MovieController extends Controller
{
    public function movie()
    {
        $movies = Movie::all();
        return view('movie', ['movies' => $movies]);
    }
}
