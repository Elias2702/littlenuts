<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname', 'lastname', 'gender', 'birthday', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function addToWatchList($movie_id)
    {
        return $this->belongsToMany('App\Movie')
                    ->attach($movie_id);
    }

    public function addToWatchedList($movie_id)
    {
        
    }

    public function addToStarredList($movie_id)
    {
        
    }

    public function hasInWatchList($movie_id)
    {
        return $this->belongsToMany('App\Movie')
                    ->wherePivot('movie_id', $movie_id)
                    ->exists();
    }

    public function hasInWatchedList($movie_id)
    {
        return $this->belongsToMany('App\Movie')
                    ->wherePivot('movie_id', $movie_id)
                    ->wherePivot('is_watched', true)
                    ->exists();
    }

    public function hasInStarredList($movie_id)
    {
        return $this->belongsToMany('App\Movie')
                    ->wherePivot('movie_id', $movie_id)
                    ->wherePivot('is_starred', true)
                    ->exists();
    }

    public function movies()
    {
        return $this->belongsToMany('App\Movie');
    }

    public function starredMovies()
    {
        return $this->belongsToMany('App\Movie')->wherePivot('is_starred', true);
    }

    public function watchedMovies()
    {
        return $this->belongsToMany('App\Movie')->wherePivot('is_watched', true);
    }


}
