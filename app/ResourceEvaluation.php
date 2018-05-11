<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ResourceEvaluation extends Model
{
    protected $table = 'resourceevaluations';    
    protected $fillable = [
        'indicator_id', 'indicator_eval',
    ];
}
