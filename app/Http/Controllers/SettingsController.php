<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use Illuminate\Http\Request;

class SettingsController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function settings() {
        $user = Auth::user();
        return view('user_settings')->withUser($user);
    }

    public function edit(Request $request) {
        $user = Auth::user();
        $user->birthday = $request->input('dateinput');
        $user->save();
    }
}
