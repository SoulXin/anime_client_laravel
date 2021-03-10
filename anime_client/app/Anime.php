<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Anime extends Model
{
    public function genre(){
        return $this->belongsToMany('App\Genre');
    }

    public function googledrive_complete(){
        return $this->hasOne('App\Googledrive_Complete');
    }

    public function googledrive_episode(){
        return $this->hasMany('App\Googledrive_Episode');
    }
}