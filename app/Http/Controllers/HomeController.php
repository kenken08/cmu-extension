<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use App\User;
use App\Projects;
use Auth;
use DB;
use Hash;
use App\Trainings;
use App\RequestTrainings;
use App\RequestTrainingsDetails;
use App\Http\LoginController;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use App\Requests;
use Carbon\Carbon;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request)
    {
        $user = new Role();
        if($user->admin() == true && Auth::user()->status !== 'pending'){
            $title = 'Admin';
            $users = User::where('status','pending')->count();
            $proj = Projects::all();
            $pcdetails = Projects::join('pcdetails','pcdetails.proj_id','=','projects.id')->get();
            $projects = Projects::count();
            $trainings = Trainings::all();
            return view('home',compact('title','trainings','role','proj','pcdetails'))->with(['projects'=> $projects, 'users'=>$users]);
        }
        elseif($user->unit() == true && Auth::user()->status !== 'pending'){
            $title = 'Unit';
            $projects = Projects::count();
            $requests = RequestTrainings::all();
            $trainings = Trainings::all();
            $proj = Projects::all();
            $messages = Requests::join('users','users.id','=','requests.user_id')->orderBy('requests.created_at','DESC')->get();
            // $fullname = User::join('requests','requests.id','=','users.id')->pluck('fname','lname');
            $events = DB::table('request_trainings_details')->orderby('fdate','ASC')->where('status','=','Approved')->get();
            return view('home',compact('messages','title','requests','projects','events','trainings'))->with(['title'=> $title,'proj'=>$proj]);
        }
        elseif($user->user()==true && Auth::user()->status !== 'pending'){
            if(Auth::user()->status == 'pending'){
                Auth::guard()->logout();

                $request->session()->flush();
        
                $request->session()->regenerate();
        
                return redirect('/');
            }
            else{
                return view('pages.index');
            }
        }
        
    }

    public function changepassword(Request $request){
        $this->validate($request, [
            'old_password'          => 'required',
            'password'              => 'required|min:6|different:old_password',
            'password_confirmation' => 'required|same:password'
        ]);
        if(Hash::check($request->input('old_password'),auth()->user()->password)){
            $change = User::find(user()->id);
            $change->password = Hash::make($request->input('password'));
            $change->save();

            notify()->success('Success','Password has been successfully changed');
            return redirect()->back();
        }
        else{
            notify()->error('Oops!','Current Password did not match');
            return redirect()->back();
        }
    }

    public function delete(Request $request)
    {
        $user = User::find($request->input('uid'));
        // $user = User::find($id);
        if($user->profile_image !== 'noimage.png'){
            Storage::delete('public/cover_images/'.$user->profile_image);
        }
        $user->Delete();
        notify()->success('Success', 'User Deleted successfully');
        return redirect()->back();
        // var_dump($user);
    }
}
