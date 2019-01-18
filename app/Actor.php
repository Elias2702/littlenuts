<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Actor extends Model
{
    protected $fillable = [
        'first_name', 'last_name', 'picture_url'
    ];

    public function movies()
    {
        return $this->belongsToMany('App\Movie');
    }

}