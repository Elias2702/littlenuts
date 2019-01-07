@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="text-center mb-4 mt-3">Welcome to {{ config('app.name') }}</h2>
    <h3 class="text-center mb-3 mt-3">Latest movies</h3>
    @include('partials.movies')
    <h3 class="text-center mb-3 mt-3">Latest actors</h3>
    @include('partials.actors')
</div>
@endsection