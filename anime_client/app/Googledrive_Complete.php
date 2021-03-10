<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Googledrive_Complete extends Model
{
    protected $table = 'googledrive_completes';
    public function anime(){
        return $this->belongsTo('App\Anime');
    }
}
