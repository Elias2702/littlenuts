@extends('layouts.app')

@section('content')

    <div class="cardContainer">
        <div class="moviePoster" style="width: 40rem; margin:2%; padding:2%;">
            <img class="card-img-top" src="{{ $movieId->picture_url }}" alt="moviePoster">
        </div>
        <div class="textBox">
            <div class="movieTitle">
                <h1> {{ $movieId->title }} </h1>
            </div>

            <div class="releaseDate">
                <p> {{ $movieId->release_date}} </p>
            </div>
        </div>

    </div>

@endsection