@extends('layouts.app')

@section('content')
<div class="container">
        <div class="card-columns">
            @foreach ($actors as $actor)
            <div class="card text-center">
                    <div class="card-body">
                        <img src="{{ $actor->picture_path }}" class="img-fluid mb-3">
                        <h5 class="card-title" style="white-space:nowrap;overflow:hidden;text-overflow:ellipsis;"><a href="">{{ $actor->first_name }} {{ $actor->last_name }}</a></h5>
                    </div>
                  </div>
            @endforeach
        </div>
    
        <div class="d-flex mt-2">
            <div class="mx-auto">
                {{ $actors->links() }}
            </div>
        </div>
    </div>
@endsection