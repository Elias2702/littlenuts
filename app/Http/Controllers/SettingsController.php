<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function settings()
    {
        $users = \App\User::all();
        if (Auth::user()) {
            return view('user_settings')->withUser($users);
        }
    }
}
