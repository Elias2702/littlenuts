<?php

Route::get('/', function () {
    return view('welcome');
});


Route::resource('movie', 'MovieController');
Route::resource('actor', 'ActorController');
Route::resource('list', 'ListController');
Route::resource('user', 'UserController');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/user_settings', 'SettingsController@settings'); // Afficher la vue profil

Route::patch('/settings', 'SettingsController@edit'); // Editer son profil

Route::get('/movies', 'MovieController@showMovies')->name('show_movies'); // Afficher la liste de film au complet

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/moviecard/{id}', 'MovieController@showMovie')->name('show_movie'); // Afficher un film en particulier

Route::any('search', 'MovieController@searchMovies')->name('search_movies'); // Fonction de recherche de film

/* AJOUT BENEDICTE */
// Actor List
Route::get('/actors', function() {
    $actors = \App\Actor::all();
    return view('actors', compact('actors'));})->name('actors');

// Pour la page d'un acteur particulier à partir de son id
Route::get('/actors/{id}', function ($id) {
    $actor = \App\Actor::find($id);
    return view('actor', compact('actor'));})->name('show_actor');

// Pour la liste des films
Route::get('/movies', function() {
    $movies = \App\Movie::all();
    return view('movies', compact('movies'));
})->name('movies');

//Route::get('/actors', 'ActorsList')->name('actors');
