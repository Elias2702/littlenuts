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

// Guest routes
Route::get('/', 'PublicController@index')->name('index');
Route::get('/actors', 'PublicController@actors')->name('actors');
Route::get('/movies', 'PublicController@movies')->name('movies');

// Auth routes
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');