<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use Illuminate\Http\Request;
use App\Resource;
use App\ResourceEvaluation;
use App\User;
use App\Evaluation;

class ResourceEvaluationController extends Controller
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
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(auth()->user()->admin == 2){
            $title ="Resource Evaluation";
            $projects = DB::table('projects')->get();
            $trainings = DB::table('trainings')->get();
            $resources = DB::table('resources')->get();
            $evals = DB::table('evaluations')->get();
            return view('evaluations.resource.index')->with(['title'=>$title, 'resources'=>$resources,'evals'=>$evals,'projects'=>$projects,'trainings'=>$trainings]);
        }
        else{
            return view('errors.Unauthorized');
        }
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
        $this->validate($request,[
            'training_drop'=>'required',
            'resource_drop'=>'required',
            'topic'=>'required',
        ]);
        
        $title ="Resource Evaluation";
        $resources = DB::table('resources')->get();
        $evals = DB::table('evaluations')->get();

        $data = $request->except('_token');

        $indicator_eval = count($data['indicator_eval']);
        $indicator_id = count($data['indicator_id']);
        if($indicator_eval < 8){
            flash()->error('Oops, Please Evaluate every item');
            return redirect()->back();
        }else{
            for($i=0;$i<$indicator_eval;$i++){
                $resource = new ResourceEvaluation;
                // $resource->user_id = auth()->user()->id;
                $resource->proj_id = $data['project'];
                $resource->training_id = $data['training_drop']; 
                $resource->rt_id = $data['resource_drop'];
                $resource->comment = $data['comment']; 
                $resource->indicator_id = $data['indicator_id'][$i];
                $resource->indicator_eval = $data['indicator_eval'][$i];
                $resource->save();
            }
            flash()->success('Success, Evaluated Successfully');
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
}
