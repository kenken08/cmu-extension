<?php

namespace App\Http\Controllers;

use DB;
use DateTime;
use Carbon;
use App\User;
use App\Projects;
use App\projobjectives;
use App\projobjectivesdetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use Illuminate\Notifications\Notification;

class ForumController extends Controller
{
    public function index(Request $request){
        $title="Projects";
        $objectives= projobjectivesdetails::all();
        $projects = DB::table('projects')->get();
        $projects = DB::table('projects')->paginate(5);
        return view('Forums.index',compact('title','objectives'))->with('projects', $projects);
    }
}
