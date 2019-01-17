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
use App\topicsandresource;
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
            $projects = DB::table('projects')->where('stat','inprogress')->get();
            $projectcom = DB::table('projects')->where('stat','completed')->get();
            $pc = pcdetails::join('colleges','colleges.id','=','pcdetails.college_id')->get();
            $objectives = projobjectivesdetails::all();
            $title = "Projects";
            $colleges = DB::table('colleges')->get();

            return view('Units.Projects.index',compact('pc','title','colleges','objectives','projectcom'))->with('projects', $projects);
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
                'project_image'=>'nullable|image|nullable'
            ]);

            if(date('Y-m-d',strtotime($request->input('date_conducted'))) > date('Y-m-d',strtotime($request->input('to_date')))){
                notify()->error('Oops!', 'To Date Conducted must not be less than the From Date Conducted');
                return redirect()->back();
            }else{
                if($request->hasFile('project_image')){            
                    $filenameWithExt = $request->file('project_image')->getClientOriginalName();
                    $filename =pathinfo($filenameWithExt, PATHINFO_FILENAME);
                    $extension = $request->file('project_image')->getClientOriginalExtension();
                    $fileNameToStore = $filename .'_'.time().'.'.$extension;
                    $path = $request->file('project_image')->storeAs('public/project_image', $fileNameToStore);
                }
                else{
                    $fileNameToStore = 'banner-1.jpg';
                }
    
                $projects = new Projects;
                $projects->project_name = $request->input('project_name');
                $projects->venue = $request->input('venue');
                $projects->date_conducted = $request->input('date_conducted');
                $projects->to_date = $request->input('to_date');
                $projects->user_id = auth()->user()->id;
                $projects->description = $request->input('description');
                $projects->project_image = $fileNameToStore;
                $projects->stat = 'inprogress';
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
    }
    public function show($id)
    {
        $title = "Trainings";
        $project = Projects::findOrFail($id);
        return view('Units.Trainings.index',compact('title'))->with('project', $project);
    }
    public function edit($id)
    {  
        $title ="Edit Project";
        $project = Projects::find($id);
        $colleges = DB::table('colleges')->get();
        $pcdetail = pcdetails::where('proj_id','=',$id)->value('college_id');
        $pcdetail_id = pcdetails::where('proj_id','=',$id)->value('id');
        $objectives = projobjectives::all()->where('proj_id','=',$id);
        return view('Units.Projects.edit',compact('project','colleges','title','objectives','pcdetail','pcdetail_id'));
    }
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'project_name' => 'required',
            'venue' => 'required',
            'date_conducted' => 'required|date',
            'to_date' => 'nullable|date',
        ]);

        

        $title = 'Edit Project';
        $projects = Projects::find($id);

        if($request->hasFile('project_image')){
            
            if($projects->project_image !== 'banner-1.jpg'){
                Storage::delete('public/project_image/'.$projects->project_image);
            }
            
            $filenameWithExt = $request->file('project_image')->getClientOriginalName();
            $filename =pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('project_image')->getClientOriginalExtension();
            $fileNameToStore = $filename .'_'.time().'.'.$extension;
            $path = $request->file('project_image')->storeAs('public/project_image', $fileNameToStore);
        }
        else{
            $fileNameToStore = $projects->project_image;
        }

        $projects->project_name = $request->input('project_name');
        $projects->venue = $request->input('venue');
        $projects->date_conducted = $request->input('date_conducted');
        $projects->to_date = $request->input('to_date');
        $projects->user_id = auth()->user()->id;
        $projects->description = $request->input('description');
        $projects->project_image = $fileNameToStore;
        $projects->save();

        $pcdetails = pcdetails::find($request->input('pcdetailsid'));
        $pcdetails->user_id = auth()->user()->id;
        $pcdetails->college_id = $request->input('college_id');
        $pcdetails->save();

        // $objectives = DB::table('Projects')->orderBy('id',"DESC")->take(1)->value('id');
        // $data = Input::get('objectives');
        // $sepa = explode(',',$data);
        // $ite = count($sepa);
        // $total = 40/$ite;

        // for($i=0;$i<$ite;$i++){
        //     $object = projobjectives::find();
        //     $object->proj_id = $objectives;
        //     $object->objective = $sepa[$i];
        //     $object->status = 'Pending';
        //     $object->value = $total;
        //     $object->save();
        // }

        // $details = projobjectives::all()->where('proj_id','=',$objectives)->where('status','=','Completed')->sum('value');
        // $save = new projobjectivesdetails;
        // $save->proj_id = $objectives;
        // $save->total =  $details;
        // $save->save();

        notify()->success('Success', 'Project successfully updated');
        return redirect()->back();
    }
    public function destroy($id)
    {
        
    }
    public function getTrainings($id)
    {
        if(auth()->user()->admin == '2' || '1'){
            
            $projects = DB::table('projects')->get();
            $trainings = DB::table('trainings')->get();
            $project = Projects::findOrFail($id);
            $colleges = DB::table('colleges')->get();
            $ptdetails = DB::table('ptdetails')->get();
            $title = "Trainings";

            return view('Units.Trainings.index',compact('title','resource'))->with(['ptdetails'=>$ptdetails,'trainings'=> $trainings, 'projects' => $projects, 'project' => $project,'colleges'=>$colleges]);
        }
            flash()->error('Unauthorized access of page');
            return redirect('/');
    }
    public function createTraining($id)
    {
        $title = "Add Trainings";
        $project = Projects::findOrFail($id);
        return view('Units.Trainings.add',compact('title'))->with('project', $project);
    }
    public function getTrainees($pid,$tid)
    {
        if(auth()->user()->admin == '2' || '1'){

            $title = "Participants";
            $attendees =  DB::table('attendees')->get();
            $trainings = DB::table('trainings')->get();
            $projects = DB::table('projects')->get();
            $project = Projects::findOrFail($pid);
            $train = Trainings::findOrFail($tid);
            $users = User::where('admin',0)->get();
            $details = DB::table('trainingsdetails')->get();

            return view('Units.Attendees.show',compact('title','users'))->with(['attendees'=> $attendees,'train'=> $train,'trainings'=> $trainings,'project' => $project, 'projects' => $projects,'details'=>$details]);
        }else{
            return redirect('/')->back()->withMessage('Error Unauthorized access of page');
        }
    }
    public function saveobj(Request $request){
        
        $data = $request->except('_token');
        $ite = count($data['editobj']);

        $foreach = Input::get('editobj');
        
        for($i=0;$i<$ite;$i++){
            $obj = projobjectives::find($data['id'][$i]);
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
        
        notify()->success('Success', 'Objective(s) successfully updated');
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

    public function edittraining($tid)
    {
        $title = "Edit Training";
        $training = Trainings::find($tid);
        $training_id = $tid;
        return view('Units.Trainings.edit',compact('title','training_id'))->with('training',$training);
    }
    public function completedproj($id){
        
        $proj = Projects::find($id);
        $proj->stat = 'completed';
        $proj->save();

        notify()->success('Success','Updated Successfully');
        return redirect()->back();
        // var_dump($proj->project_name);
    }
    public function getResource($id){
        $title = "Add Resource and Topics";
        $train = Trainings::find($id);
        $resource = DB::table('topicsandresource')->get();
        return view('Units.Trainings.add_resource',compact('title','resource','train'));
    }
    public function getstatus($id){
        $title="Status";
        $project =  Projects::find($id);
        return view('Units.Projects.status',compact('title','project'));
    }
    public function updatestatus(Request $request,$id){
        $process = Projects::find($id);
        $process->start_status = $request->get('start_status');
        $process->otp_status = $request->get('on_the_process_status');
        $process->save();

        notify()->success('Success','Status updated successfully');
        return redirect()->back();

        // dd($request->all());
    }
    public function getTrainingStatus($id){
        $title ="Training Status";
        $training = Trainings::find($id);
        return view('Units.Trainings.status',compact('title','training'));
    }
    public function updateTrainingStatus(Request $request,$id){
        $status = Trainings::find($id);
        $status->status = $request->input('on_the_process_status');
        $status->save();

        notify()->success('Success','Status updated successfully');
        return redirect()->back();
    }
}
