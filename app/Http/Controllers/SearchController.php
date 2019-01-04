<?php // Search Controller

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movie;
use Illuminate\Support\Facades\Input;

class SearchController extends Controller {

    public function searchMovie(Request $request){

        $search = $request->get('q');

        return Movie::where('title', 'release_date', '%'.$search.'%')->get();

    }
}