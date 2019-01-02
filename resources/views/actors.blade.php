@extends('layouts.app')

@section('content')
<div class="container">
        @include('partials.actors')
        <div class="d-flex mt-2">
            <div class="mx-auto">
                {{ $actors->links() }}
            </div>
        </div>
    </div>
@endsection