<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trainings extends Model
{
    protected $table = 'trainings';
    
    public function trainings(){
        return $this->belongsTo('App\Projects');   
    }
    public function attendees(){
        return $this->hasMany('App\Attendees');
    }
}
