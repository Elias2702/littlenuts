@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        @auth
            <div class="card-img-top embed-responsive embed-responsive-16by9">
                <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/{{ $movie->trailer_url }}" allowfullscreen></iframe>
            </div>
        @else
            <img class="card-img-top img-fluid" src="https://img.youtube.com/vi/{{ $movie->trailer_url }}/maxresdefault.jpg" alt="">
        @endauth
        <div class="card-body">
            <h2 lass="card-title">{{ $movie->title }}</h2>
            <p class="card-text"><small class="text-muted">{{ $movie->release_date }}</small></p>
            <p class="card-text">{{ $movie->synopsis }}</p>
        </div>
    </div>
</div>
@endsection