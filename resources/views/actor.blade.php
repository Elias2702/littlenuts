@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="actor-pict col-lg-4">
            <a href="{{ route('actors.one', $actor->id) }}">
                <img src="{{ $actor->picture_path }}" class="img-fluid mb-3">
            </a>
        </div>
        <div class="actor-name col-lg-8">
            <h2>{{ $actor->first_name . ' ' . $actor->last_name }}</h2>

            <!-- La liste des films doit être générée automatiquement
            via une requête vers la bdd qui récupère tous les films dans lequel l'acteur
            est trouvé, ensuite on renvoit ces infos dans une boucle-->
            <ul>
                <a href="#"><li>LOTR</li></a>
                <a href="#"><li>Bob l'éponge</li></a>
                <a href="#"><li>Pulp fiction</li></a>
            </ul>

            <button type="button" class="btn btn-secondary">Ajouter cet acteur à votre liste "Favori"</button>
            <!-- Permettre un ajout en base de données -->
            <button type="button" class="btn btn-secondary">Ajouter un film pour cet acteur</button>
        </div>
    </div>
</div>
@endsection