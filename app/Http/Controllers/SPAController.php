<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Actor;
use App\Movie;

class SPAController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('guest');
    // }

    public function createMovie(array $data)
    {
        return Movie::create([
            'title' => $data['title'],
            'synopsis' => $data['synopsis'],
            'trailer_url' => $data['trailer_url'],
            'cover_path' => $data['cover_path'],
            'release_date' => $data['release_date'],
        ]);
    }

    public function showActors()
    {
        return Actor::all();
    }

    public function showMovies()
    {
        return Movie::all();
    }
}
