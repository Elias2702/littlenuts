<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class List extends Model 
{

    protected $table = 'lists';
    public $timestamps = true;
    protected $fillable = array('is_watched', 'is_favorited');

    public function movie()
    {
        return $this->hasOne('Movie');
    }

    public function user()
    {
        return $this->belongsTo('User');
    }

}