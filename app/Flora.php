<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Flora extends Model
{
    //
    public function floraphotos(){
    	return $this->hasMany('App\Floraphoto');
    }
}
