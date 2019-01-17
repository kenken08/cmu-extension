<?php

namespace App\Http\Controllers;

use App\User;
use App\Projects;
use App\Trainings;
use App\Attendees;
use App\ptdetails;
use App\topicsandresource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use Illuminate\Notifications\Notification;
use DB;
use Auth;

class TrainingsController extends Controller
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(auth()->user()->admin == '2'){
            $trainings = DB::table('trainings')->get();
            $projects = DB::table('projects')->get();
            $title = "Trainings";

            return view('Units.Trainings.index',compact('title'))->with(['trainings'=> $trainings, 'projects' => $projects]);
        }
            return redirect('/')->with('error', 'Unauthorized access of page');
    }

    /**
     * Show the form for creating a new resource.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $title = "Add Trainings";
        $project = Projects::findOrFail($id);
        return view('Units.Trainings.add',compact('title'))->with('project', $project);
    }

    /**
     * Store a newly created resource in storage.
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'training_name' => 'required',
            'venue' => 'required',
            'fdate_conducted' => 'required|date',
            'tdate_conducted' => 'required|date',
            'noofdays' => 'required',
            'noofparticipants' => 'required',
            'pdt' => 'required',
            'training_image'=>'nullable|image|nullable'
        ]);

        if(date('Y-m-d', strtotime($request->input('tdate_conducted'))) < date('Y-m-d', strtotime($request->input('fdate_conducted')))){
            notify()->error('Oops!','To Date Conducted is greater than From Date Conducted');
            return redirect('/home/projects/'.$request->input('proj_id').'/trainings');
        }else{
            if($request->hasFile('training_image')){            
                $filenameWithExt = $request->file('training_image')->getClientOriginalName();
                $filename =pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $extension = $request->file('training_image')->getClientOriginalExtension();
                $fileNameToStore = $filename .'_'.time().'.'.$extension;
                $path = $request->file('training_image')->storeAs('public/training_image', $fileNameToStore);
            }
            else{
                $fileNameToStore = 'banner-1.jpg';
            }

            $trainings = new Trainings;
            $trainings->training_name = $request->input('training_name');
            $trainings->venue = $request->input('venue');
            $trainings->fdate_conducted = $request->input('fdate_conducted');
            $trainings->tdate_conducted = $request->input('tdate_conducted');
            $trainings->noofdays = $request->input('noofdays');
            $trainings->noofparticipants = $request->input('noofparticipants');
            $trainings->pdt = $request->input('pdt');
            $trainings->user_id = auth()->user()->id;
            $trainings->proj_id = $request->input('proj_id');
            $trainings->training_image = $fileNameToStore;
            $trainings->description = $request->input('description');
            $trainings->save();

            $trainid = Trainings::orderBy('created_at', "DESC")->take(1)->value('id');
            
            $training = new ptdetails;
            $training->user_id = auth()->user()->id;
            $training->training_id = $trainid;
            $training->proj_id = $request->input('proj_id');
            $training->save();
            
            notify()->success('Success',' Training successfully added');
            return redirect('/home/projects/'.$request->input('proj_id').'/trainings');
        }
        
        // $fd = new \DateTime($request->input('fdate_conducted'));
        // $td = new \DateTime($request->input('tdate_conducted'));

        // $c = ($fd>$td);

        // var_dump($c);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title = "Edit Training";
        return view('Units.Trainings.edit',compact('title'));
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
        $this->validate($request,[
            'training_name' => 'required',
            'venue' => 'required',
            'fdate_conducted' => 'required|date',
            'tdate_conducted' => 'required|date',
            'noofdays' => 'required',
            'noofparticipants' => 'required',
            'pdt' => 'required',
            'description'=>'required',
        ]);

        $title = 'Add Trainings';
        $trainings = Trainings::find($id);

        if($request->hasFile('training_image')){
            
            if($trainings->training_image !== 'banner-1.jpg'){
                Storage::delete('public/training_image/'.$trainings->training_image);
            }
            
            $filenameWithExt = $request->file('training_image')->getClientOriginalName();
            $filename =pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('training_image')->getClientOriginalExtension();
            $fileNameToStore = $filename .'_'.time().'.'.$extension;
            $path = $request->file('training_image')->storeAs('public/training_image', $fileNameToStore);
        }
        else{
            $fileNameToStore = $trainings->training_image;
        }

        $trainings->training_name = $request->input('training_name');
        $trainings->venue = $request->input('venue');
        $trainings->fdate_conducted = $request->input('fdate_conducted');
        $trainings->tdate_conducted = $request->input('tdate_conducted');
        $trainings->noofdays = $request->input('noofdays');
        $trainings->noofparticipants = $request->input('noofparticipants');
        $trainings->pdt = $request->input('pdt');
        $trainings->user_id = auth()->user()->id;
        $trainings->proj_id = $request->input('proj_id');
        $trainings->training_image = $fileNameToStore;
        $trainings->description = $request->input('description');
        $trainings->save();

        // $trainid = Trainings::orderBy('created_at', "DESC")->take(1)->value('id');
        
        // $training = new ptdetails;
        // $training->user_id = auth()->user()->id;
        // $training->training_id = $trainid;
        // $training->proj_id = $request->input('proj_id');
        // $training->save();

        notify()->success('Success',' Training successfully updated');
        return redirect()->back();
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
    public function addTopics(Request $request,$id){
        $this->validate($request,[
            'resource_name' => 'required',
            'topic' => 'required',
        ]);
        
        $resource = new topicsandresource;
        $resource->train_id = $id;
        $resource->resource_name = $request->input('resource_name');
        $resource->evaluated = 0;
        $resource->topic = $request->input('topic');
        $resource->save();

        notify()->success('Success','Resource Person and Topic added successfully');
        return redirect()->back();
    }
}
