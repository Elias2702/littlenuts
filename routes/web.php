<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::resource('movie', 'MovieController');
Route::resource('actor', 'ActorController');
Route::resource('list', 'ListController');
Route::resource('user', 'UserController');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

// Pour la liste des acteurs
Route::get('/actors', function() {
    $actors = \App\Actor::all();
        // Un modèle est une image de la bdd
        // Récupère le modèle Actor dans la bdd
    return view('actors', compact('actors'));
        // Créé un tableau automatique avec le nom des variables donnés en paramètre.
        // Execute la vue actors et emmène WITH lui les données demandées
})->name('actors'); //Donne un nom plus explicite à la route

// Pour la page d'un acteur particulier à partir de son id
Route::get('/actors/{id}', function ($id) {
    $actor = \App\Actor::find($id);
        //On va chercher son id depuis le modèle Actor
    return view('actor', compact('actor'));
})->name('show_actor'); //donne un nom explicite à la route

// Pour la liste des films
Route::get('/movies', function() {
    $movies = \App\Movie::all();
    return view('movies', compact('movies'));
})->name('movies');


Route::get('/user_settings', 'SettingsController@settings'); // Afficher la vue profil

Route::patch('/settings', 'SettingsController@edit'); // Editer son profil

Route::get('/movies', 'MovieController@showMovies')->name('show_movies'); // Afficher la liste de film au complet

Route::get('/moviecard/{id}', 'MovieController@showMovie')->name('show_movie'); // Afficher un film en particulier

Route::any('search', 'MovieController@searchMovies')->name('search_movies'); // Fonction de recherche de film
