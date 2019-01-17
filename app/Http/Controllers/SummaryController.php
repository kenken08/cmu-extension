<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use App\trainingsevaluation;
use App\Trainings;
use App\Projects;
use App\topicsandresource;
use Illuminate\Http\Request;

class SummaryController extends Controller
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
    public function index(){
        $title = "Summaries";
        $projects = Projects::all();
        $trainings = DB::table('trainings')->get();

        $aspects = DB::table('aspect_evals')->get();
        $evals = DB::table('aspect_eval_details')->get();

        return view('evaluations.summary.trainingindex',compact('projects','aspects'))->with(['title'=>$title,'trainings'=>$trainings]);
    }
    public function getData(Request $request){
        $this->validate($request,['training_drop'=>'required']);
        $project = $request->input('project');
        $training = $request->input('training_drop');

        $pname=Projects::where('id',$project)->value('project_name');
        $tname=Trainings::where('id',$training)->value('training_name');
        $part=Trainings::where('id',$training)->value('noofparticipants');

        $summary='';
        $title = "Training Summary";
        $projects = Projects::all();
        $aspects = DB::table('aspect_evals')->get();
        $evals = DB::table('aspect_eval_details')->get();

        $summaries = DB::table('trainingsevaluations')->where('proj_id','=',$project)->where('training_id','=',$training)->get();

        $sum = DB::table('trainingsevaluations')->where('proj_id','=',$project)->where('training_id','=',$training)
                ->join('aspect_evals','aspect_evals.id','=','trainingsevaluations.aspect_id')->get();

        $distinct = DB::table('attendees')->join('trainingsevaluations','eval_id','=','attendees.id')
                    ->where('trainingsevaluations.proj_id','=',$project)->where('trainingsevaluations.training_id','=',$training)->distinct()->pluck('attendees.id');

        $remarks = trainingsevaluation::where('proj_id','=',$project)->where('training_id','=',$training)->distinct('eval_id')->pluck('remarks');

        $ite = count($aspects);
        $b = 100;
        $bt = 80;
        $g = 60;
        $f = 40;
        $n = 20;
        

        for($i=0;$i<$ite;$i++){
            $best = count($sum->where('aspect_eval',1));
            $t = $best * $b;
            $c = $t/$ite;
        }

        for($i=0;$i<$ite;$i++){
            $btr = count($sum->where('aspect_eval',2));
            $to = $btr * $bt;
            $co = $to/$ite;
        }

        for($i=0;$i<$ite;$i++){
            $good = count($sum->where('aspect_eval',3));
            $tot = $good * $g;
            $com = $tot/$ite;
        }

        for($i=0;$i<$ite;$i++){
            $fair = count($sum->where('aspect_eval',4));
            $tota = $fair * $f;
            $comm = $tota/$ite;
        }

        for($i=0;$i<$ite;$i++){
            $need = count($sum->where('aspect_eval',5));
            $total = $need * $n;
            $commo = $total/$ite;
        }

        $rate = ($c+$co+$com+$comm+$commo);

        return view('evaluations.summary.trainingresult',compact(
            'title','projects','aspects','evals','summary','tname','part','pname','summaries','distinct','rate','remarks'));
    }

    // Resource Functions
    public function indexresource(){
        $title = "Summaries";
        $resources = DB::table('resources')->get();
        return view('evaluations.summary.resourceindex',compact('proj','projects','resources'))->with(['title'=>$title]);
    }

    public function getResults(Request $request){
        $title  = "Summary";

        $project = $request->input('project');
        $training = $request->input('training_drop');
        $resource = $request->input('resource_drop');

        $pname=Projects::where('id',$project)->value('project_name');
        $tname=Trainings::where('id',$training)->value('training_name');
        $rname = topicsandresource::find($resource);
        $resources = DB::table('resources')->get();
        $evals = DB::table('evaluations')->get();

        $summaries = DB::table('resourceevaluations')->where('proj_id','=',$project)->where('training_id','=',$training)->where('rt_id',$resource)->get();

        $sum = DB::table('resourceevaluations')->where('proj_id','=',$project)->where('training_id','=',$training)->where('rt_id',$resource)->get();
        $noe = count($sum)/8;

        $ite = count($resources);
        $b = 100;
        $bt = 80;
        $g = 60;
        $f = 40;
        $n = 20;
        

        for($i=0;$i<$ite;$i++){
            $best = count($sum->where('indicator_eval',1));
            $t = $best * $n;
            $c = $t/$ite;
        }

        for($i=0;$i<$ite;$i++){
            $btr = count($sum->where('indicator_eval',2));
            $to = $btr * $f;
            $co = $to/$ite;
        }

        for($i=0;$i<$ite;$i++){
            $good = count($sum->where('indicator_eval',3));
            $tot = $good * $g;
            $com = $tot/$ite;
        }

        for($i=0;$i<$ite;$i++){
            $fair = count($sum->where('indicator_eval',4));
            $tota = $fair * $bt;
            $comm = $tota/$ite;
        }

        for($i=0;$i<$ite;$i++){
            $need = count($sum->where('indicator_eval',5));
            $total = $need * $b;
            $commo = $total/$ite;
        }

        $rate = ($c+$co+$com+$comm+$commo);

        return view('evaluations.summary.resourceresult',compact('title','summaries','pname','tname','rname','resources','evals','noe','rate'));
    }



    public function searchproj(Request $request){
        $this->validate($request,[
            'project'=> 'required',
        ]);
        $title = "Summaries";
        $aspects = DB::table('aspect_evals')->get();
        $evals = DB::table('aspect_eval_details')->get();

        $best = 0;
        $training_name = $request->input('project');
        $trim =  explode(',',$training_name);
        $name = Projects::where('id','=',$trim[0])->value('project_name');

        $trainings = Trainings::where('proj_id','=',$trim[0])->get();


        return view('evaluations.summary.trainingresult',compact('aspects','name','best'))->with(['title'=>$title,'trainings'=>$trainings]);
    }
}
