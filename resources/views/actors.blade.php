@extends('layouts.app')

@section('content')
<div class="container">
    <h2>List by actors</h2>
    <ul>
        @foreach($actors as $actor)
            <div class="row">
                <div class="ActorBox col-lg-4 centered">
                    <ul class="list-unstyled">
                        <li>
                            <img class="actorPict" src="{{$actor->picture_url}}" alt="picture's actor"/>
                            <a class="{{ Route::is('actors') ? 'active' : '' }}" href="{{ route('show_actor', $actor->id) }}">{{ $actor->first_name }} {{ $actor->last_name }}</a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- Trouver comment afficher les éléments l'un à coté de l'autre sur la grille (par 4)-->
        @endforeach
    </ul>
</div>
@endsection
{!! Form::open(array('route' => 'route.name', 'method' => 'POST')) !!}
	<ul>
		<li>
			{!! Form::label('first_name', 'First_name:') !!}
			{!! Form::text('first_name') !!}
		</li>
		<li>
			{!! Form::label('last_name', 'Last_name:') !!}
			{!! Form::text('last_name') !!}
		</li>
		<li>
			{!! Form::label('picture_url', 'Picture_url:') !!}
			{!! Form::text('picture_url') !!}
		</li>
		<li>
			{!! Form::submit() !!}
		</li>
	</ul>
{!! Form::close() !!}
