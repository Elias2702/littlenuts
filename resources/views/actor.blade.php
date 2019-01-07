@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3 text-center">
            <img src="{{ $actor->picture_path }}" class="img-fluid mb-3">
        </div>
        <div class="col-md-9">
            <h2 class="mb-4">{{ $actor->first_name . ' ' . $actor->last_name }}</h2>
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Animi, assumenda! Quas rerum natus eum exercitationem rem saepe, eaque voluptatem praesentium quia officiis, officia, pariatur eius blanditiis ex doloremque eos perspiciatis. Quod fuga magnam iste praesentium illum. Tempora sapiente eius asperiores.</p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <h3 class="mb-3">Filmography</h3>
            @include('partials.movies', [$movies = $actor->movies()->get()])
        </div>
    </div>
</div>
@endsection