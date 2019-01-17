<?php

namespace App\Http\Controllers;

use Auth;
use DB;
use App\TrainingsDetails;
use App\Trainings;
use App\Projects;
use App\AspectEval;
use App\AspectEvalDetails;
use App\trainingsevaluation;
use App\topicsandresource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class TrainingsEvaluationController extends Controller
{
    public function index()
    {
        $projects = DB::table('projects')->get();
        $trainings = DB::table('trainings')->get();
        $aspects = DB::table('aspect_evals')->get();
        $evals = DB::table('aspect_eval_details')->get();
        $title ="Training Evaluation";
        $attendees = DB::table('attendees')->get();
        $details = DB::table('trainingsdetails')->get();
        return view('evaluations.training.index',compact('details'))->with(['attendees'=>$attendees,'title'=> $title,'aspects'=>$aspects,'evals'=>$evals,'projects'=>$projects,'trainings'=>$trainings]); 
    }
    public function create()
    {
        //
    }
    public function store(Request $request)
    {
        $this->validate($request,[
            'project'=>'required',
            'training_drop'=>'required',
            'nameofevaluator'=>'required',
            'date'=>'required',
        ]);

        $data = $request->except('_token');
        // $count = trainingsevaluation::count();
        $idd = TrainingsDetails::where('attendee_id',$data['nameofevaluator'])->value('id');

        if(count($data['aspect_eval'])==14){
            $aspect_eval = count($data['aspect_id']);
            for($i=0;$i<$aspect_eval;$i++){
                $resource = new trainingsevaluation;
                $resource->user_id = auth()->user()->id;
                $resource->proj_id = $data['project'];
                $resource->training_id = $data['training_drop'];
                // $resource->venue = $data['venue'];
                $resource->eval_id = $data['nameofevaluator'];
                $resource->remarks = $data['remarks'];
                $resource->dateoftraining = $data['date']; 
                $resource->aspect_id = $data['aspect_id'][$i];
                $resource->aspect_eval = $data['aspect_eval'][$i];
                $resource->save();
            }
            
            $evaluator = TrainingsDetails::find($idd);
            $evaluator->status = 2;
            $evaluator->save();

            notify()->success('Success', 'Evaluated Successfully');
            return redirect()->back();
        }
        else{
            notify()->error('Oops', 'Please Check every item');
            return redirect('/training/evaluation');
        }
    }
    public function show($id)
    {
        //
    }
    public function edit($id)
    {
        //
    }
    public function update(Request $request, $id)
    {
        //
    }
    public function destroy($id)
    {
        //
    }
    public function getTrainings($id){
        $trainings = Trainings::where('proj_id','=', $id)->pluck('training_name','id');
        $list = '';
        foreach ($trainings as $key => $value) {
            if(count($trainings) <= 0){
                $list .= "<option selected disabled>No Training under the selected Project</option>";
            }
            else{
                $list .= "<option value='" . $key . "'>" . $value . "</option>";
            }
        }
        return $list;
    }
    public function getEvaluator($id){
        $trainings = DB::table('trainingsdetails')->join('attendees','attendees.id','=','trainingsdetails.attendee_id')->where('trainingsdetails.training_id','=', $id)->where('trainingsdetails.status',1)->get();
        $list = '';
        foreach ($trainings as $key) {
            if(count($trainings) <= 0){
                $list .= "<option selected disabled>No Trainee</option>";
            }
            else{
                $list .= "<option selected value='" . $key->id . "'>" . $key->fname.' '.$key->lname . "</option>";
            }
        }
        return $list;
    }
    public function getResource($id){
        $res = topicsandresource::where('train_id',$id)->get();
        $list = '';
        foreach ($res as $key) {
            $list .= "<option selected value='" . $key->id . "'>" . $key->resource_name . "</option>";
        }
        return $list;
    }
    public function getTopic($id){
        $res = topicsandresource::where('id',$id)->value('topic');
        $list = '';
        $list .= '<input type="text" name="topic" class="form-control" placeholder="Topic" value="'. $res .'">';
        return $list;
    }
}