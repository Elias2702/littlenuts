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
        'firstname', 'lastname', 'gender', 'birthday', 'email', 'password', 'is_premium', 'referrer_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function referrals()
    {
        return $this->hasMany('App\User', 'referrer_id')
                    ->where('referrer_id', $this->id)
                    ->get();
    }

    public function addReferral($referral_id)
    {
        $referral = User::findOrFail($referral_id);
    
        // Add the referrer to the referral only if
        // it has no referrer already or it is not its own referrer.
        if (!empty($referral->referrer_id) || $referral->referrer_id != $this->id) {
            $referral->referrer_id = $this->id;
            $referral->save();
        }
    }

    public function removeReferral($referral_id)
    {
        $referral = User::findOrFail($referral_id);

        if ($referral->referrer_id == $this->id) {
            $referral->referrer_id = null;
            $referral->save();
        }
    }

    public function isPremium()
    {
        return (bool) $this->is_premium;
    }

    public function setPremium($enabled = true)
    {
        $this->is_premium = $enabled;

        if($enabled) {
            $this->referrer_id = null;
        }

        return $this->save();
    }

    public function isPremiumOrReferral()
    {
        return $this->is_premium || isset($this->referrer_id);
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
            $this->movies()->attach($movie_id);
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
            $this->movies()->attach($movie_id);
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
