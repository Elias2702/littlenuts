@extends('layouts.app')

@section('content')
<div class="container">
    @include('partials.movies')

    <div class="d-flex mt-2">
        <div class="mx-auto">
            {{ $movies->links() }}
        </div>
    </div>
</div>
@endsection