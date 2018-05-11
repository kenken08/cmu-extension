<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TrainingsDetails extends Model
{
    protected $table = 'trainingsdetails';
    
    public function details(){
        return $this->belongsTo('App\User');   
    }

    public function projects(){
        return $this->hasMany('App\Projects');   
    }

    public function trainings(){
        return $this->hasMany('App\Trainings');   
    }

    protected $fillable = [ 'user_id','att_id', 'proj_id','training_id'];
}
