@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Submit a movie to our database !</h1>
            <p>Upon submition of the form, the movie will automatically be added to the catalogue. Be proud and remain calm.<br>One day, a great team of beautiful people will verify all customers added movies before updating the database.</p>
        </div>
    </div>
    <add-movie></add-movie>
</div>
@endsection
