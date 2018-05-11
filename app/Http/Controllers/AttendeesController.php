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
        $title = "Attendees";
        $project = Projects::findOrFail($pid);
        $train = Trainings::findOrFail($tid);
        $attendees = Attendees::all();
        $details = DB::table('trainingdetails')->get();
        return view('Units.Attendees.show',compact('title','project','train'))->with(['attendees'=> $attendees,'details'=>$details]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title="Create Trainee";
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
        if(!$request->input('project_id') ==  null){
            $attendee = new TrainingsDetails;
            $attendee->user_id = auth()->user()->id;
            // $attendee->project_id = $request->input('project_id');
            $attendee->training_id = $request->input('training_id');
            $attendee->attendee_id = $request->input('attendee');
            $attendee->save();

            $notif = notify()->success('Success', 'Attendee successfully added');
            return redirect()->back();
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
            // $attendee = implode('_', $attendee);
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
        // $attendee = implode('_', $attendee);
        $attendee->att_id = $request->input('attendee');
        $attendee->save();

        $notif = notify()->success('Success', 'Attendee successfully added');
        return redirect('/home/projects/'.$attendee->project_id.'/trainings/'.$attendee->training_id.'/trainees')->with('notif', $notif);
        
    }
}
