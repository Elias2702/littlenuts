<?php // Search Controller

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movie;
use Illuminate\Support\Facades\Input;

class SearchController extends Controller {

    public function getData(Request $request){

        $search = $request->search;
        $movies = Movie::where('title', 'release_date', "%$search%")->paginate(20);

        return response()->json([
            'model'     => $movies
        ]);
    }
}