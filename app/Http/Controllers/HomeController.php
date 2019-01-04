<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($action = null)
    {
        if ($action == null) {
            $movies = Auth::user()->movies()->wherePivot('is_watched', false)->paginate(24);
        } elseif ($action == 'starred') {
            $movies = Auth::user()->starredMovies()->paginate(24);
        } elseif ($action == 'watched') {
            $movies = Auth::user()->watchedMovies()->paginate(24);
        } else {
            abort(404);
        }

        return view('home', compact('movies'));
    }

    public function addToWatchList(Request $request)
    {
        Auth::user()->addToWatchList($request->validate([
            'id' => 'required'
        ]));

        return back();
    }

    public function removeFromWatchList(Request $request)
    {
        Auth::user()->removeFromWatchList($request->validate([
            'id' => 'required'
        ]));

        return back();
    }

    public function addToWatchedList(Request $request)
    {
        Auth::user()->addToWatchedList($request->validate([
            'id' => 'required'
        ]));

        return back();
    }

    public function removeFromWatchedList(Request $request)
    {
        Auth::user()->removeFromWatchedList($request->validate([
            'id' => 'required'
        ]));

        return back();
    }

    public function addToStarredList(Request $request)
    {
        Auth::user()->addToStarredList($request->validate([
            'id' => 'required'
        ]));

        return back();
    }

    public function removeFromStarredList(Request $request)
    {
        Auth::user()->removeFromStarredList($request->validate([
            'id' => 'required'
        ]));

        return back();
    }
}
