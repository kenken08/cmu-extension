<?php

namespace App\Http\Controllers;

use Auth;
use DB;
use App\AspectEval;
use App\AspectEvalDetails;
use App\trainingsevaluation;
use Illuminate\Http\Request;

class TrainingsEvaluationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = DB::table('projects')->get();
        $trainings = DB::table('trainings')->get();
        $aspects = DB::table('aspect_evals')->get();
        $evals = DB::table('aspect_eval_details')->get();
        $title ="Training Evaluation";
        $attendees = DB::table('attendees')->get();
        return view('evaluations.training.index')->with(['attendees'=>$attendees,'title'=> $title,'aspects'=>$aspects,'evals'=>$evals,'projects'=>$projects,'trainings'=>$trainings]); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->except('_token');

        if(!count($data['aspect_id'])>14){
            $aspect_eval = count($data['aspect_id']);
            for($i=0;$i<$aspect_eval;$i++){
                $resource = new trainingsevaluation;
                $resource->user_id = auth()->user()->id;
                //$resource->proj_id = $data['proj_id'];
                $resource->training_id = $data['training_id'];
                // $resource->venue = $data['venue'];
                $resource->eval_id = $data['nameofevaluator'];
                $resource->remarks = $data['remarks'];
                $resource->dateoftraining = $data['dateoftraining']; 
                $resource->aspect_id = $data['aspect_id'][$i];
                $resource->aspect_eval = $data['aspect_eval'][$i];
                $resource->save();
            }
            notify()->success('Success', 'Evaluated Successfully');
            return redirect()->back();
        }
        else{
            notify()->error('Oops', 'One check in every row only');
            return redirect('/training/evaluation');
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
}
