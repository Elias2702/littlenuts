@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif     
            <div class="card">
                <div class="card-header">
                    <ul class="nav nav-tabs card-header-tabs">
                        <li class="nav-item">
                            <a class="nav-link active" href="#">Watchlist</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Starred</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Watched</a>
                        </li>
                    </ul>
                </div>

                <div class="card-body">
                    <div class="row">
                        @foreach ($movies as $movie)
                            <div class="col-md-3">
                               <div class="media">
                                    <img src="{{ $movie->cover_path }}" class="mr-3" style="width:60px">
                                    <div class="media-body">
                                        <h5><a href="">{{ $movie->title }}</a></h5>
                                        <p><small class="text-muted">{{ $movie->release_date }}</small></p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
