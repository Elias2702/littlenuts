<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Movie extends Model 
{

    use Searchable;
    protected $table = 'movies';
    public $timestamps = true;
    protected $fillable = array('title', 'synopsis', 'trailer_url', 'release_date');

    public function actors()
    {
        return $this->hasMany('App\Actor');
    }

    public function users()
    {
        return $this->belongsToMany('App\User');
    }

}