<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use App\About;

class AboutController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(){
        $title = "About Us";
        $about = DB::table('abouts')->orderBy('id', "DESC")->take(1)->get();
        return view('admin.about.index',compact('about'))->with('title', $title);
    }

    public function store(Request $request){
        
        $ab =  new About;
        $ab->about = $request->input('content');
        $ab->user_id = auth()->user()->id;
        $ab->save();

        notify()->success('Success', 'About Us updated successfully');
        return redirect()->back();
    }
}
