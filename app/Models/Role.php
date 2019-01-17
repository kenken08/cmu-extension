<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Auth;
use DB;

class Role extends Model
{
    use SoftDeletes;

    protected $table = 'users';

    protected $guarded = ['id'];
    
    /**
    * @var
    * @param integer $role
    */ 
    public function admin(){

        $user = DB::table('users')->where('admin','=','1')->value('admin');
        if(Auth::user()->admin == $user){
            return $user;
        }
    }
    public function unit(){
        $user = DB::table('users')->where('admin','=','2')->value('admin');
        if(Auth::user()->admin == $user){
            return $user;
        }
    }
    public function user(){
        $user = DB::table('users')->where('admin','=','0')->value('admin');
        if(Auth::user()->admin == $user ){
            return $user;
        }
    }
    public function confirm(){
        $user = DB::table('users')->where('status','=','pending')->value('status');
        if(Auth::user()->status == $user ){
            return $user;
        }
    }
}
