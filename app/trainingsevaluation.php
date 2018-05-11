<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class trainingsevaluation extends Model
{
    protected $table = 'trainingsevaluations';    
    protected $fillable = [
        'aspect_id', 'aspect_eval',
    ];
}
