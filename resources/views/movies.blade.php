@extends('layouts.app')

@section('content')

<h1>Movies</h1>

<form class="form-horizontal">
    <fieldset>
    <!-- Search input-->
    <div class="form-group">
      <label class="col-md-4 control-label" for="searchinput"></label>
      <div class="col-md-4">
        <input id="searchinput" name="searchinput" type="search" placeholder="" class="form-control input-md" required="">
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
    

    @foreach ($movies as $movie)
        <div class="card" style="width: 20rem; margin:2%; padding:2%;">
            <img class="card-img-top" src="{{ $movie->picture_url }}" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title" style="text-align: center;"> {{ $movie->title }} </h5>
                    <p class="card-text" style="text-align: center;"> {{ $movie->synopsis }} </p>
                    <a href="#" class="btn btn-primary" style="margin:2%;">See more</a><a href="#" class="btn btn-primary">Watch now</a><br/><br/>

                    <a href="#" class="btn btn-default" style="margin:2%;">Favorite</a>
                </div>
        </div>
    @endforeach