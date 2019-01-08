@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Movies</h1>

    <div class="movies_container" style="display: flex; flex-wrap:wrap;">

        @foreach ($movies as $movie)

        <div class="card" style="width: 20rem; margin:2%; padding:2%;">

            <img class="card-img-top" src="{{ $movie->picture_url }}" alt="moviePoster">

            <div class="card-body">

                <h5 class="card-title" style="text-align: center;"> {{ $movie->title }} </h5>
                <p class="card-text" style="text-align: center;"> {{ $movie->synopsis }} </p>
                <a class="btn btn-primary {{ Route::is('moviecard') ? 'active' : '' }}" href="{{ route('show_movie', $movie->id) }}" style="margin:2%;">See more</a>
                <a href="#" class="btn btn-primary">Watch now</a><br /><br />
                <a href="#" class="btn btn-default" style="margin:2%;">Favorite</a>

            </div>

        </div>
        @endforeach
    </div>
</div>
@endsection
