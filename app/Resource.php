<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resource extends Model
{
    protected $table ="resources";

    public function trainings(){
        return $this->belongsTo('App\Trainings');   
    }
    public function attendees(){
        return $this->belongsTo('App\Attendees');   
    }
}
