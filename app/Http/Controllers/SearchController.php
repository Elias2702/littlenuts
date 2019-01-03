<?php // Search Controller

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use function App\Movie;
use Illuminate\Support\Facades\Input;

class SearchController extends Controller {

    public function searchMovie(Request $request){
        $post = Post::where('title' $request->keywords)->get();

        return response()->json($post);
    }
}