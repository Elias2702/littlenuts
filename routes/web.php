<?php

// GUEST -------------------------------------------------------------------- //

// Homepage
Route::get('/', 'PublicController@index')->name('index');

// Actors
Route::get('/actors', 'PublicController@actors')->name('actors.all');
Route::get('/actors/{id}', 'PublicController@actor')->name('actors.one');

// Movies
Route::get('/movies', 'PublicController@movies')->name('movies.all');
Route::get('/movies/{id}', 'PublicController@movie')->name('movies.one');

// AUTH --------------------------------------------------------------------- //

// Authentication
Auth::routes();

// Dashboard
Route::get('/home/{action?}', 'HomeController@index')->name('home');