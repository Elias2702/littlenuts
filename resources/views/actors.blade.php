@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <h2>List by actors</h2>
    </div>

    <ul>
        @foreach($actors as $actor)
                <div class="ActorBox col-lg-4 centered">
                    <ul class="list-unstyled">
                        <li>
                            <img class="actorPict" src="{{$actor->picture_url}}" alt="picture's actor"/>
                            <a class="{{ Route::is('actors') ? 'active' : '' }}" href="{{ route('show_actor', $actor->id) }}">{{ $actor->first_name }} {{ $actor->last_name }}</a>
                        </li>
                    </ul>
                </div>
            <!-- Trouver comment afficher les éléments l'un à coté de l'autre sur la grille (par 4)-->
        @endforeach
    </ul>
</div>
@endsection