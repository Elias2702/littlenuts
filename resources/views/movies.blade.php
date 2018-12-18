@extends('layouts.app')

@section('content')

	<h1>Movies</h1>

	<ul>
		@foreach($movies as $movie)
			<div class="movieBox">
				<li> {{ $movie->title }} </li>
				<li> {{ $movie->synopsis }} </li>
			</div>

			<figure class="figure">
  				<img src="{{ $movie->picture_url }}" class="figure-img img-fluid rounded" alt="Movie Poster">
  				<figcaption class="figure-caption"> {{ $movie->synopsis }} </figcaption>
			</figure>
		@endforeach
	</ul>

@endsection


{{-- {!! Form::open(array('route' => 'route.name', 'method' => 'POST')) !!}
	<ul>
		<li>
			{!! Form::label('title', 'Title:') !!}
			{!! Form::text('title') !!}
		</li>
		<li>
			{!! Form::label('synopsis', 'Synopsis:') !!}
			{!! Form::textarea('synopsis') !!}
		</li>
		<li>
			{!! Form::label('trailer_url', 'Trailer_url:') !!}
			{!! Form::text('trailer_url') !!}
		</li>
		<li>
			{!! Form::label('release_date', 'Release_date:') !!}
			{!! Form::text('release_date') !!}
		</li>
		<li>
			{!! Form::submit() !!}
		</li>
	</ul>
{!! Form::close() !!} --}} 