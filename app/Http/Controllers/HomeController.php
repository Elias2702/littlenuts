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
            $movies = Auth::user()->movies()->paginate(24);
        } elseif ($action == 'starred') {
            $movies = Auth::user()->starredMovies()->paginate(24);
        } elseif ($action == 'watched') {
            $movies = Auth::user()->watchedMovies()->paginate(24);
        } else {
            abort(404);
        }

        return view('home', compact('movies'));
    }
}
