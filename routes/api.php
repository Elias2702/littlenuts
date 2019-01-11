<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('movies', 'SPAController@showMovies');
Route::get('actors', 'SPAController@showActors');

Route::group(['middleware' => 'auth:api'], function () {
    Route::post('logout', 'Auth\LoginController@logout');
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
<<<<<<< HEAD
    Route::get('settings/account', function (Request $request) {
        return $request->user();
    });

=======
>>>>>>> cc44276d8f2765a19c2a85f9c244153438c65ee5
    Route::patch('settings/profile', 'Settings\ProfileController@update');
    Route::patch('settings/account', 'Settings\AccountController@update');
    Route::patch('settings/password', 'Settings\PasswordController@update');
});

Route::group(['middleware' => 'guest:api'], function () {
    Route::post('login', 'Auth\LoginController@login');
    Route::post('register', 'Auth\RegisterController@register');
    Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
    Route::post('password/reset', 'Auth\ResetPasswordController@reset');
<<<<<<< HEAD
    Route::get('catalogue', function (Request $request) {
        return $request->movies();
    });
=======

>>>>>>> cc44276d8f2765a19c2a85f9c244153438c65ee5
    Route::post('oauth/{driver}', 'Auth\OAuthController@redirectToProvider');
    Route::get('oauth/{driver}/callback', 'Auth\OAuthController@handleProviderCallback')->name('oauth.callback');
});
