<?php

namespace App\Http\Controllers;

use DB;
use Carbon\Carbon;
use App\User;
use App\Requests;
use App\Requestdetails;
use App\RequestTrainings;
use App\RequestTrainingsDetails as RT;
use App\Trainings;
use App\announcements;
use App\TrainingsDetails as td;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){
        $today = RT::join('trainings','trainings.id','=','request_trainings_details.training_id')->where('request_trainings_details.fdate','==',Carbon::today())->get();
        $upcoming = RT::join('trainings','trainings.id','=','request_trainings_details.training_id')->where('request_trainings_details.fdate','>',Carbon::today())->get();
        $announce = announcements::orderBy('expires_at','DESC')->take(3)->get();
        return view('pages.index',compact('announce','today','upcoming'));
    }
    public function about(){
        $title = 'About Us';
        $about = DB::table('abouts')->orderBy('id', "DESC")->take(1)->get();
        return view('pages.about', compact('about'))->with('title', $title);
    }
    public function services(){
        $data = array(
            'title' => 'Services',
            'services' => ['Projects', 'Trainings']
        );
        return view('pages.services')->with($data);
    }
    public function trainings(){
        $data = array(
            'title' => 'Trainings',
        );
        return view('pages.trainingsindex')->with($data);
    }
    public function trainingssearch(Request $request){
        $title = "Trainings";
        $searched = $request->input('search');
        $cut = explode(' ',$searched);
        $ite = count($cut);
        
        // for($i=0;$i<$ite;$i++){
        //     $result = Trainings::where('training_name','LIKE','%'.$searched[$i].'%')
        //             ->join('projects','projects.id','=','trainings.proj_id')->get();

        //     return view('pages.trainingssearch-result',compact('searched','trainings','title'))->withDetails($result)->withQuery($searched);
        // }

        $result = Trainings::where('training_name','LIKE','%'.$searched.'%')->orWhere('trainings.description','LIKE','%'.$searched.'%')->get();

        return view('pages.trainingssearch-result',compact('searched','trainings','title'))->withDetails($result)->withQuery($searched);
    }
    public function register(){
        return $this->view('auth.register');
    }
    public function contact(){
        $title = 'Contact Us';
        return view('website.contact')->with('title', $title);
    }
    public function accountprofile(){
        $title="Profile";
        return view('website.account.accountprofile',compact('title'));
    }
    public function accountrequest(){
        $title = "Requests";
        $requests = RT::join('request_trainings','request_trainings.id','=','request_trainings_details.req_id')->join('trainings','trainings.id','=','request_trainings_details.training_id')->where('request_trainings.user_id',auth()->user()->id)->get();
        $requests = RT::join('request_trainings','request_trainings.id','=','request_trainings_details.req_id')->join('trainings','trainings.id','=','request_trainings_details.training_id')->where('request_trainings.user_id',auth()->user()->id)->paginate(10);
        return view('website.account.account-requests',compact('title','requests'));
    }
    public function accountmessages(){
        $title = "Messages";
        $c = Requests::where('user_id',auth()->user()->id)->value('id');
        $rd = Requestdetails::join('requests','requestdetails.requestid','=','requests.id')->join('users','users.id','=','requestdetails.repliedbyid')
                ->where('requests.id',$c)->orderBy('datetime','DESC')->get();
        return view('website.account.account-message',compact('title','rd'));
    }
    public function accountactivities(){
        $title = "Activities";
        $events = td::join('trainings','trainings.id','=','trainingsdetails.training_id')->where('attendee_id',auth()->user()->id)->get();
        return view('website.account.account-activities',compact('title','events'));
    }
}
