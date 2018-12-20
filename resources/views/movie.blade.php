@extends('layouts.app')

@section('content')

    @foreach ($movieId as $movie)
        
    <h1> {{ $movie->title }} </h1>

    @endforeach
    
@endsection