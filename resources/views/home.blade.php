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
                            <a class="nav-link {{ Request::is('home') ? 'active' : '' }}" href="/home">Watchlist</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('home/starred') ? 'active' : '' }}" href="/home/starred">Starred</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('home/watched') ? 'active' : '' }}" href="/home/watched">Watched</a>
                        </li>
                    </ul>
                </div>

                <div class="card-body">
                    @include('partials.movies')
                </div>

                <div class="d-flex mt-2">
                    <div class="mx-auto">
                        {{ $movies->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
