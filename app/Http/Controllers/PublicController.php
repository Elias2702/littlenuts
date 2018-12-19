<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movie;
use App\Actor;

class PublicController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function actors()
    {
        $actors = Actor::orderBy('last_name', 'asc')->paginate(24);

        return view('actors', compact('actors'));
    }

    public function movies()
    {
        $movies = Movie::orderBy('release_date', 'desc')->paginate(24);

        return view('movies', compact('movies'));
    }
}
