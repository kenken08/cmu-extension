<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use App\User;
use App\Projects;
use Auth;
use DB;
use App\Http\LoginController;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $user = new Role();
        if($user->admin() == true){
            $title = 'Admin';
            $users = User::count();
            $projects = Projects::count();
            return view('home',compact('title','role'))->with(['projects'=> $projects, 'users'=>$users]);
        }
        elseif($user->unit() == true){
            $title = 'Unit';
            return view('home',compact('title'))->with(['title'=> $title]);
        }
        elseif($user->user()==true){
            return view('pages.index');
        }
    }
}
