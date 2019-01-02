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

Route::get('/user_settings', 'SettingsController@settings'); // Afficher la vue profil

Route::patch('/settings', 'SettingsController@edit'); // Editer son profil

Route::get('/movies', 'MovieController@showMovies')->name('show_movies'); // Afficher la liste de film au complet

Route::get('/moviecard/{id}', 'MovieController@showMovie')->name('show_movie'); // Afficher un film en particulier

Route::any('search', 'MovieController@searchMovies')->name('search_movies'); // Fonction de recherche de film
