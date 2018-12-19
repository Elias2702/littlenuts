@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card-columns">
        @foreach ($movies as $movie)
        <div class="card text-center">
                <div class="card-body">
                    <img src="{{ $movie->cover_path }}" class="img-fluid mb-3">
                    <h5 class="card-title" style="white-space:nowrap;overflow:hidden;text-overflow:ellipsis;"><a href="">{{ $movie->title }}</a></h5>
                    <p class="card-text" style="white-space:nowrap;overflow:hidden;text-overflow:ellipsis;">{{ $movie->synopsis }}</p>
                    <p class="card-text"><small class="text-muted">{{ $movie->release_date }}</small></p>
                </div>
              </div>
        @endforeach
    </div>

    <div class="d-flex mt-2">
        <div class="mx-auto">
            {{ $movies->links() }}
        </div>
    </div>
</div>
@endsection