@extends('layouts.app')

@section('content')

    @if (Auth::check())
        <div class="container">
            <h3 class="text-center mb-3 mt-3">Latest movies</h3>
            @include('partials.movies')
            <h3 class="text-center mb-3 mt-3">Latest actors</h3>
            @include('partials.actors')
        </div>
    @else
        <div class="container">
            <h2 class="text-center mb-4 mt-3">Netflix? Amazon? HBO?</h2>
            <h1 class="text-center mb-4 mt-3">Don't go <strong>nuts</strong>.</h1>
            <div id="logo_container"><img id="logo_black" src="{{ asset('svg/logo_black.svg') }}" alt="Little nuts logo"></div>
            <h2 class="text-center mb-4 mt-3">Spare your wallet and choose {{ config('app.name') }}!</h2>
        </div>
        @include('auth.login')
    @endif

@endsection
