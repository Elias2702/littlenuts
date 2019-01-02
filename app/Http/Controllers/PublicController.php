<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movie;
use App\Actor;

class PublicController extends Controller
{
    public function index()
    {
        $movies = Movie::orderBy('id', 'desc')->take(3)->get();
        $actors = Actor::orderBy('id', 'desc')->take(3)->get();
        return view('index', compact('movies', 'actors'));
    }

    public function actors()
    {
        $actors = Actor::orderBy('last_name', 'asc')->paginate(24);
        return view('actors', compact('actors'));
    }

    public function actor($id)
    {
        $actor = Actor::find($id);
        return view('actor', compact('actor'));
    }

    public function movies()
    {
        $movies = Movie::orderBy('release_date', 'desc')->paginate(24);
        return view('movies', compact('movies'));
    }

    public function movie($id)
    {
        $movie = Movie::find($id);
        return view('movie', compact('movie'));
    }
}
