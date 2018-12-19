@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="text-center">{{ $actor->first_name . ' ' . $actor->last_name }}</h2>
</div>
@endsection