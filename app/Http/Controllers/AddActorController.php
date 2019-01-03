<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AddActorController extends Controller
{
    public function store()
    {
        request()->validate([
            'firstname' => ['required'],
        ]);

        actor::create([
            'firstname' => request('firstname'),
            'lastname' => 'pitt',
            'picture_url' => 'alt'
        ]);

        return "Success";
    }
}
