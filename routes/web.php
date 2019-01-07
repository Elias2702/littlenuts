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

// Add Movies as a User
Route::get('/add_movie', 'AddMovieController@index')->name('add.movies');

// AUTH --------------------------------------------------------------------- //

// Authentication
Auth::routes();

// Dashboard
Route::get('/home/{action?}', 'HomeController@index')->name('home');

// Others
Route::get('/user_settings', 'SettingsController@settings')->name('user.settings');
Route::patch('/settings', 'SettingsController@edit');

// Add to lists
Route::post(
    '/add-to-watch-list',
    'HomeController@addToWatchList'
)->name('add-to-watch-list');
Route::post(
    '/remove-from-watch-list',
    'HomeController@removeFromWatchList'
)->name('remove-from-watch-list');

Route::post(
    '/add-to-watched-list',
    'HomeController@addToWatchedList'
)->name('add-to-watched-list');
Route::post(
    '/remove-from-watched-list',
    'HomeController@removeFromWatchedList'
)->name('remove-from-watched-list');

Route::post(
    '/add-to-starred-list',
    'HomeController@addToStarredList'
)->name('add-to-starred-list');
Route::post(
    '/remove-from-starred-list',
    'HomeController@removeFromStarredList'
)->name('remove-from-starred-list');
