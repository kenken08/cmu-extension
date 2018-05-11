<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class projobjectives extends Model
{
    protected $table = 'projobjectives';

    protected $foreignkey = 'proj_id';

    public function objectives(){
        return $this->belongsTo('App\Projects');
    }
}
