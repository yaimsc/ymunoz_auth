<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    public function to(){
      return $this->belongsTo('App\User', 'to', 'id');
    }

    public function from(){
      return $this->belongsTO('App\User','from','id');
    }
}
