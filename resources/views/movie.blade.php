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
            <div class="alert alert-danger" role="alert">
                  <h3 class="alert-danger">Want to watch this masterpiece?</h3>
                  {{-- Mettre les boutons register et login sur la même ligne que leurs textes respectifs --}}
                  <div id="register"><h6>Check out our great deals and become one of our much beloved customers!</h6><a class="btn btn-primary" href="/register">Register</a></div>
                  <hr>
                  <div id="login"><p class="mb-0">Already a LittleNuts subscriber? </p><a class="btn btn-primary" href="/login">Log in</a></div>
            </div>
        @endauth
        <div class="card-body">
            <h2 lass="card-title">{{ $movie->title }}</h2>
            <p class="card-text"><small class="text-muted">{{ $movie->release_date }}</small></p>
            <p class="card-text">{{ $movie->synopsis }}</p>
        </div>
    </div>
</div>
@endsection
