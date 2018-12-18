<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Actor extends Model 
{

    protected $table = 'actors';
    public $timestamps = true;
    protected $fillable = array('first_name', 'last_name', 'picture_url');

    public function movies()
    {
        return $this->hasMany('Movie')->withPivot();
    }

}