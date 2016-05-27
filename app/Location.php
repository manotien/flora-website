<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    //
    public function floras(){
    	return $this->hasMany('App\Flora');
    }
}
