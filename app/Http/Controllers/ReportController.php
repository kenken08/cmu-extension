<?php

namespace App\Http\Controllers;

use App\Projects;
use App\Trainings;
use PDF;
use Illuminate\Http\Request;

class ReportController extends Controller
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
    
    public function index()
    {
        $title="Report";
        return view('Report.index')->with(['title'=>$title]);
    }
    public function generate(Request $request){
        if($request->has('download')){
            $pdf = PDF::loadView('generate');
            return $pdf->download('generate.pdf');
        }
        return view('generate');
    }
    public function search(Request $request){
        $this->validate($request,[
            'fdate'=>'required',
            'tdate'=>'required',
        ]);

        $fdate = $request->input('fdate');
        $tdate = $request->input('tdate');

        $projects = Projects::join('pcdetails','pcdetails.proj_id','=','projects.id')->whereBetween('date_conducted',[$fdate,$tdate])->get();

        $trainings = Trainings::join('projects','trainings.proj_id','=','projects.id')->join('pcdetails','pcdetails.proj_id','=','projects.id')->whereBetween('date_conducted',[$fdate,$tdate])->get();

        $trained = Trainings::join('projects','trainings.proj_id','=','projects.id')->join('pcdetails','pcdetails.proj_id','=','projects.id')->whereBetween('date_conducted',[$fdate,$tdate])->get();
        // var_dump($total);
        return view('Report.index',compact('projects','trainings','trained','tdate'));
    }
}