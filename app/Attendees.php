<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendees extends Model
{
    protected $table ='attendees';

    public function user(){
        return $this->belongsTo('App\Trainings');   
    }
}
