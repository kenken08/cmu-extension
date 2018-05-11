<?php

namespace App\Http\Controllers;

use DB;
use Auth;
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
        $best = DB::table('trainingsevaluations')->where('aspect_eval','=','1')->count();
        $better = DB::table('trainingsevaluations')->where('aspect_eval','=','2')->count();
        $good = DB::table('trainingsevaluations')->where('aspect_eval','=','3')->count();
        $fair = DB::table('trainingsevaluations')->where('aspect_eval','=','4')->count();
        $needs = DB::table('trainingsevaluations')->where('aspect_eval','=','5')->count();
        $poor = DB::table('resourceevaluations')->where('indicator_eval','=','1')->count();
        $fair = DB::table('resourceevaluations')->where('indicator_eval','=','2')->count();
        $moderate = DB::table('resourceevaluations')->where('indicator_eval','=','3')->count();
        $good = DB::table('resourceevaluations')->where('indicator_eval','=','4')->count();
        $excellent = DB::table('resourceevaluations')->where('indicator_eval','=','5')->count();
        $title = "Summaries";
        return view('evaluations.summary.index',compact('poor','fair','good','moderate','excellent','best','better','good','fair','needs'))->with(['title'=>$title]);
    }
}
