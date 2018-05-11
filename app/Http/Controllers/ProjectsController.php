<?php

namespace App\Http\Controllers;

use App\User;
use App\Models\Role;
use App\Projects;
use App\Trainings;
use App\pcdetails;
use App\ptdetails;
use App\Colleges;
use App\trainingsdetails;
use App\projobjectives;
use App\projobjectivesdetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use Illuminate\Notifications\Notification;
use DB;
use Auth;

class ProjectsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        if(auth()->user()->admin == '1' || auth()->user()->admin == '2'){
            $projects = DB::table('projects')->get();
            $objectives = projobjectives::all();
            $title = "Projects";
            $colleges = DB::table('colleges')->get();

            return view('Units.Projects.index',compact('title','colleges','objectives'))->with('projects', $projects);
        }
            return redirect('/')->with('error', 'Unauthorized access of page');
    }
    public function create()
    {
        $title = 'Add Project';
        $colleges = DB::table('colleges')->get();
        return view('Units.Projects.add',compact('colleges'))->with('title', $title);
    }
    public function store(Request $request)
    {
            $this->validate($request,[
                'project_name' => 'required',
                'venue' => 'required',
                'date_conducted' => 'required|date',
                'to_date' => 'nullable|date',
            ]);

            $title = 'Add Project';
            $projects = new Projects;
            $projects->project_name = $request->input('project_name');
            $projects->venue = $request->input('venue');
            $projects->date_conducted = $request->input('date_conducted');
            $projects->to_date = $request->input('to_date');
            $projects->user_id = auth()->user()->id;
            $projects->save();

            $projid = Projects::orderBy('created_at', "DESC")->take(1)->value('id');

            $pcdetails = new pcdetails;
            $pcdetails->user_id = auth()->user()->id;
            $pcdetails->proj_id = $projid;
            $pcdetails->college_id = $request->input('college_id');
            $pcdetails->save();

            $objectives = DB::table('Projects')->orderBy('id',"DESC")->take(1)->value('id');
            $data = Input::get('objectives');
            $sepa = explode(',',$data);
            $ite = count($sepa);
            $total = 40/$ite;

            for($i=0;$i<$ite;$i++){
                $object = new projobjectives;
                $object->proj_id = $objectives;
                $object->objective = $sepa[$i];
                $object->status = 'Pending';
                $object->value = $total;
                $object->save();
            }

            $details = projobjectives::all()->where('proj_id','=',$objectives)->where('status','=','Completed')->sum('value');
            $save = new projobjectivesdetails;
            $save->proj_id = $objectives;
            $save->total =  $details;
            $save->save();

            notify()->success('Success', 'Project successfully added');
            return redirect('/home/projects');
    }
    public function show($id)
    {
        $title = "Trainings";
        $project = Projects::findOrFail($id);
        return view('Units.Trainings.index',compact('title'))->with('project', $project);
    }
    public function edit($id)
    {

    }
    public function update(Request $request, $id)
    {
        
    }
    public function destroy($id)
    {
        
    }
    public function getTrainings($id)
    {
        if(auth()->user()->admin == '2'){
            
            $projects = DB::table('projects')->get();
            $trainings = DB::table('trainings')->get();
            $project = Projects::findOrFail($id);
            $colleges = DB::table('colleges')->get();
            $ptdetails = DB::table('ptdetails')->get();

            $title = "Trainings";

            return view('Units.Trainings.index',compact('title'))->with(['ptdetails'=>$ptdetails,'trainings'=> $trainings, 'projects' => $projects, 'project' => $project,'colleges'=>$colleges]);
        }
            return redirect('/')->with('error', 'Unauthorized access of page');
    }
    public function createTraining($id)
    {
        $title = "Add Trainings";
        $project = Projects::findOrFail($id);
        return view('Units.Trainings.add',compact('title'))->with('project', $project);
    }
    public function getTrainees($pid,$tid)
    {
        if(auth()->user()->admin == '2'){
            
            $attendees =  DB::table('attendees')->get();
            $trainings = DB::table('trainings')->get();
            $projects = DB::table('projects')->get();
            $project = Projects::findOrFail($pid);
            $train = Trainings::findOrFail($tid);
            $details = DB::table('trainingsdetails')->get();
            $title = "Attendees";

            return view('Units.Attendees.show',compact('title'))->with(['attendees'=> $attendees,'train'=> $train,'trainings'=> $trainings,'project' => $project, 'projects' => $projects,'details'=>$details]);
        }
            return redirect('/')->back()->withMessage('Error Unauthorized access of page');
    }
    public function saveobj(Request $request){
        
        $data = $request->except('_token');
        $ite = count($data['editobj']);
        
        for($i=0;$i<$ite;$i++){
            $obj = projobjectives::findorfail($data['id'][$i]);
            $obj->status = $data['editobj'][$i];
            // if($data['editobj'][$i] == 'Completed'){
            //     $obj->value = 10;
            // }else{
            //     $obj->value = 0;
            // }
            $obj->save();
        }

        $input = $request->input('project');
        $objdet = $request->input('objdet');
        $details = projobjectives::all()->where('proj_id','=',$input)->where('status','=','Completed')->sum('value');
        $save = projobjectivesdetails::findorfail($objdet);
        $save->proj_id = $input;
        $save->total =  $details;
        $save->save();
        notify()->success('Success', 'Objective/s successfully updated');
        return redirect('/home/projects');
    }

    public function viewdetails(Request $request, $id){
        $objectives = projobjectives::all();
        $projects = Projects::all();
        $project = Projects::findorfail($id);
        $title = "Objectives";
        $objectivesdet = projobjectivesdetails::all();
        
        return view('Units.Projects.objectives',compact('objectives','projects','project','objectivesdet'))->with('title', $title);
    }
}
