<?php

namespace App\Http\Controllers;

use App\User;
use App\Projects;
use App\Trainings;
use App\Attendees;
use App\TrainingsDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use Illuminate\Notifications\Notification;
use DB;
use Auth;

class AttendeesController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
     /**
     * Display a listing of the resource.
     * @param  int  $pid
     * @param  int  $tid
     * @return \Illuminate\Http\Response
     */
    public function index($pid,$tid)
    {
        $title = "Participants";
        $project = Projects::find($pid);
        $train = Trainings::find($tid);
        // $attendees = Attendees::all();
        $attendees = Attendees::join('trainingsdetails','trainingsdetails.attendee_id','=','attendees.id')
                    ->where('attendees.id','!=','trainingsdetails.attendee_id')->where('trainingsdetails.training_id',$tid)->get();
        $users = User::all();
        $details = TrainingsDetails::all();
        return view('Units.Attendees.show',compact('title','project','train'))->with(['users'=>$users,'attendees'=> $attendees,'details'=>$details]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title="Add Participant";
        return view('Units.Attendees.create',compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *@param  int  $pid
     *@param  int  $tid
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $attendees = $request->input('attendee');
        $tid = $request->input('training_id');

        if(!$request->input('project_id') ==  null){

            $imp='';
            for($j=0;$j<count($attendees);$j++){
                $imp .= $attendees[$j].",";
            }

            $det = TrainingsDetails::where('training_id',$tid);
            $ite = count($attendees);
            $cut = explode(",", $imp,$ite);

            for($i=0;$i<count($cut);$i++){
                $det = TrainingsDetails::where('training_id',$tid)->where('attendee_id','=',$cut[$i])->value('id');
                $f = TrainingsDetails::find($det);

                // $imp = '';
                // if($det == $f){
                //     $imp = $det.',';
                //     return $imp;
                // }else{
                //     $wala= '';
                //     $wala = $det.',';
                //     return $wala;
                // }
            
                if($f == null){
                    foreach($cut as $c){
                        $attendee = new TrainingsDetails;
                        $attendee->user_id = auth()->user()->id;
                        $attendee->training_id = $request->input('training_id');
                        $attendee->attendee_id = preg_replace('/[^0-9]/','',$c);
                        $attendee->status = 1;
                        $attendee->save();
                    }

                    notify()->success('Success', 'Attendee(s) successfully added');
                    return redirect()->back();
                }
                elseif($f != null){
                    $names='';
                    foreach($cut as $c){
                        $p = preg_replace('/[^0-9]/','',$c);
                        $user = User::where('id',$p)->value('firstname');
                        $parts = Attendees::where('id',$p)->value('fname');
                        $names .= $parts.','.$user;
                    }
                    notify()->Error('Oops!', 'Participant(s) '.$names.' has already been added');
                    return redirect()->back();
                }
            }
        }
        else{
            $attendee = new Attendees;
            $attendee->fname = $request->input('fname');
            $attendee->lname = $request->input('lname');
            $attendee->sex = $request->input('sex');
            $attendee->age = $request->input('age');
            $attendee->ethnicorigin = $request->input('ethnicorigin');
            $attendee->hea = $request->input('hea');
            $attendee->religion = $request->input('religion');
            $attendee->civilstatus = $request->input('civilstatus');
            $attendee->noofchild = $request->input('noofchild');
            $attendee->occupation = $request->input('occupation');
            $attendee->address = $request->input('address');
            $attendee->cellno = $request->input('cellno');
            $attendee->save();

            $notif = notify()->success('Success', 'Attendee successfully added');
            return redirect()->back();
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function storeAtt(Request $request)
    {
        $attendee = new ProjectsDetails;
        $attendee->user_id = auth()->user()->id;
        $attendee->project_id = $request->input('project_id');
        $attendee->training_id = $request->input('training_id');
        $attendee->att_id = $request->input('attendee');
        $attendee->save();

        $notif = notify()->success('Success', 'Attendee successfully added');
        return redirect('/home/projects/'.$attendee->project_id.'/trainings/'.$attendee->training_id.'/trainees')->with('notif', $notif);
        
    }
}
