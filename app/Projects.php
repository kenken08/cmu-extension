<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Projects extends Model
{
    //Table Name
    protected $table ='projects';
    
    public function user(){
        return $this->belongsTo('App\User');   
    }
    
    public function objectives(){
        return $this->hasMany('App\projobjectives');
    }
}
