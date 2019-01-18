<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    protected $fillable = [
        'title', 'synopsis', 'trailer_url', 'release_date'
    ];

    public function actors()
    {
        return $this->belongsToMany('App\Actor');
    }

    public function users()
    {
        return $this->belongsToMany('App\User')->withPivot('is_watched', 'is_starred');
    }
}