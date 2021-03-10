<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Googledrive_Episode extends Model
{
    protected $table = 'googledrive_episodes';
    public function anime(){
        return $this->belongsTo('App\Anime');
    }
}
