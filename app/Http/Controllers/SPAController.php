<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
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
        return Actor::paginate(24);
    }

    public function showActorDetails($id)
    {
        return Actor::with('movies')->find($id);
    }

    public function showMovies()
    {
        return Movie::with('users')->paginate(24);
    }

    public function showMovieDetails($id)
    {
        return Movie::find($id);
    }

    public function getWatchList()
    {
        return Auth::user()->movies()->get();
    }

    public function getWatchedList()
    {
        return Auth::user()->watchedMovies()->get();
    }

    public function getStarredList()
    {
        return Auth::user()->starredMovies()->get();
    }

    public function addToWatchList($id)
    {
        return Auth::user()->addToWatchList($id);
    }

    public function addToWatchedList($id)
    {
        return Auth::user()->addToWatchedList($id);
    }

    public function addToStarredList($id)
    {
        return Auth::user()->addToStarredList($id);
    }

    public function removeFromWatchList($id)
    {
        return Auth::user()->removeFromWatchList($id);
    }

    public function removeFromWatchedList($id)
    {
        return Auth::user()->removeFromWatchedList($id);
    }

    public function removeFromStarredList($id)
    {
        return Auth::user()->removeFromStarredList($id);
    }

    public function hasInWatchList($id)
    {
        return Auth::user()->hasInWatchList($id);
    }

    public function hasInWatchedList($id)
    {
        return Auth::user()->hasInWatchedList($id);
    }

    public function hasInStarredList($id)
    {
        return Auth::user()->hasInStarredList($id);
    }
}
