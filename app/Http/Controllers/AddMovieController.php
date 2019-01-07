<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use function App\movie;
use Illuminate\Support\Facades\Input;

class AddMovieController extends Controller
{

  public function __construct() {
      $this->middleware('auth');
  }
  
  public function index()
  {
      $user = Auth::user();
      return view('add_movie');
  }

  public function create()
  {

  }

  public function store(Request $request)
  {

  }

  public function show($id)
  {

  }

  public function edit($id)
  {

  }

  public function update($id)
  {

  }

  public function destroy($id)
  {

  }

}
