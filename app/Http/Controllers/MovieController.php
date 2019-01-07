<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use function App\movie;
use Illuminate\Support\Facades\Input;

class MovieController extends Controller 
{

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
    
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {
    
  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(Request $request)
  {
    
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function show($id)
  {
    
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function edit($id)
  {
    
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update($id)
  {
    
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy($id)
  {
    
  }

  public function showMovies(){
    $movie = \App\Movie::all();

    return view('movies')->withMovies($movie);
  }

  public function showMovie($id){
    $movieId = \App\Movie::find($id);
    
    return view('moviecard', compact('movieId'));
  }

  public function searchMovies(){
    $q = Input::get('q');
    $movies = MovieController::where('title', '%' . $q . '%')->orWhere('id', 'LIKE', '%' . $q . '%')->get();
    if(count($movies) > 0)
        return view('movies')->withDetails($movies)->withQuery($q);
        else return view('movies')->withMessage('No movies found, try with other keywords');
  }

}