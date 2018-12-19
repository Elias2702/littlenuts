@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-4">
            <img class="actorPictProfile" src="{{$actor->picture_url}}" alt="picture's actor"/>
        </div>
        <div class="col-lg-8">
            <h2>{{$actor->first_name}} {{$actor->last_name}}</h2>

            <h3>Movie's List</h3>
            <div class="row">
                @foreach($movies as $movie)
                    <ul>
                        <li>
                            {{ $movie->title }}
                        </li>
                    </ul>
                @endforeach
        </div>
    </div>
</div>
@endsection