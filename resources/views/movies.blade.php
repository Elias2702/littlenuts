@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Movies</h1>

    <div class="search_bar">
        <form action="/search" class="form-horizontal" method="POST" role="search">
            {{ csrf_field() }}
            <fieldset>
                <!-- Search input-->
                <div class="form-group">

                    <label class="col-md-4 control-label" for="searchinput"></label>

                    <div class="col-md-4">

                        <input id="searchinput" name="searchinput" type="search" placeholder="" class="form-control input-md"
                            required="">
                        <!-- Help box -->
                        <p class="help-block">Search by title, genre, date of release and actors</p>

                    </div>

                </div>

                <!-- Button -->
                <div class="form-group">

                    <label class="col-md-4 control-label" for=""></label>

                    <div class="col-md-4">

                        <button id="" name="" class="btn btn-success">Search</button>

                    </div>
                </div>

            </fieldset>
        </form>
    </div>

    <div class="search_container">
        @if(isset($details))
    <p>The search results for you Query <b> {{ $query }} </b> are : </p>
        <h2> Sample movies details </h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Poster</th>
                    <th>Title</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($details as $movies)
                    <tr>
                        <td> {{ $movies->picture_url }} </td>
                        <td> {{ $movies->title }} </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
            
        @endif
    </div>

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


{{--

@foreach($actors as $actor)
    <div class="row">
        <div class="ActorBox col-lg-3 centered">
            <ul class="list-unstyled">
                <li>
                    <a class="{{ Route::is('actors') ? 'active' : '' }}" href="{{ route('show_actor', $actor->id) }}">{{ $actor->first_name }} {{ $actor->last_name }}</a> 
                </li>
            </ul>
        </div>
    </div>
    <!-- Trouver comment afficher les éléments l'un à coté de l'autre sur la grille (par 4)-->
@endforeach
    
--}}