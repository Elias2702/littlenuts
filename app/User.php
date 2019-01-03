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
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

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

    public function isPresent($movie_id)
    {
        return $this->movies()->where('movie_id', $movie_id)->exists();
    }

    public function addToWatchList($movie_id)
    {
        if (!$this->isPresent($movie_id)) {
            return $this->movies()->attach($movie_id);
        }
    }

    public function removeFromWatchList($movie_id)
    {
        return $this->movies()
                    ->wherePivot('is_watched', false)
                    ->wherePivot('is_starred', false)
                    ->detach($movie_id);
    }

    public function addToWatchedList($movie_id)
    {
        if (!$this->isPresent($movie_id)) {
            return $this->movies()->attach($movie_id);
        }

        return $this->movies()
                    ->updateExistingPivot($movie_id, ['is_watched' => true]);
    }

    public function removeFromWatchedList($movie_id)
    {
        return $this->movies()
                    ->updateExistingPivot($movie_id, ['is_watched' => false]);
    }

    public function addToStarredList($movie_id)
    {
        if (!$this->isPresent($movie_id)) {
            return $this->movies()->attach($movie_id);
        }
    
        return $this->movies()
                    ->updateExistingPivot($movie_id, ['is_starred' => true]);
    }

    public function removeFromStarredList($movie_id)
    {
        return $this->movies()
                    ->updateExistingPivot($movie_id, ['is_starred' => false]);
    }

    public function hasInWatchList($movie_id)
    {
        return $this->belongsToMany('App\Movie')
                    ->wherePivot('movie_id', $movie_id)
                    ->wherePivot('is_watched', false)
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
}
