<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use DateTime;
use Carbon\Carbon;
use App\Trainings;
use App\TrainingsDetails;
use App\comments;
use App\User;
use App\Projects;
use App\activities;
use App\projobjectives;
use App\projobjectivesdetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use Illuminate\Notifications\Notification;
use App\commentdetails;

class ForumController extends Controller
{
    public function index(Request $request){
        $title="Projects";
        $objectives= projobjectivesdetails::all();
        $projects = DB::table('projects')->where('stat','inprogress')->get();
        $projects = DB::table('projects')->where('stat','inprogress')->paginate(6);
        return view('Forums.index',compact('title','objectives'))->with('projects', $projects);
    }
    public function show($id){
        $title="Trainings";
        $project = Projects::find($id);
        $proj_id = $id;
        
        $trainings = Trainings::where('proj_id',$id)->get();
        $objectives= projobjectivesdetails::all();
        $activities = activities::where('proj_id',$id)->orderBy('date_of_activity','DESC')->get();
        $comments = comments::where('proj_id','=',$id)->join('users','users.id','=','comments.user_id')->get();
        $users = User::all();
        return view('Forums.show',compact('objectives','project','proj_id','comments','trainings','title','activities','users'));
    }
    public function addcomment(Request $request){
        $this->validate($request,['comment'=>'required']);

        $comment = new comments;
        $comment->user_id = Auth::user()->id;
        $comment->message = $request->input('comment');
        $comment->proj_id = $request->input('proj_id');
        $comment->date_time = Carbon::Now();
        $comment->save();
        
        flash()->success('Sent Successfully');
        return redirect()->back();

    }
    public function activities($id){
        $title = 'Activities';
        $project = Projects::find($id);
        $activities = activities::orderBy('date_of_activity','DESC')->where('proj_id',$id)->get();
        return view('activities.activities-index',compact('title','project','activities'));
    }
    public function activitiesadd(Request $request,$id){
        $data = $request->except('_token');

        if($request->hasFile('cover_photo')){            
            $filenameWithExt = $request->file('cover_photo')->getClientOriginalName();
            $filename =pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('cover_photo')->getClientOriginalExtension();
            $fileNameToStore = $filename .'_'.time().'.'.$extension;
            $path = $request->file('cover_photo')->storeAs('public/cover_photo', $fileNameToStore);
        }
        else{
            $fileNameToStore = 'noimage.png';
        }

        $activity = new activities;
        $activity->user_id = auth()->user()->id;
        $activity->proj_id = $id;
        $activity->cover_photo = $fileNameToStore;
        $activity->activity_title = $data['atitle'];
        $activity->description = $data['actdesc'];
        $activity->date_of_activity = $data['date_of_activity'];
        $activity->icon = $data['icon'];
        $activity->save();

        notify()->success('Success','Activity successfully Posted');
        return redirect()->back();
    }
    public function activityedit($id,$aid){
        $title = "Edit Activity";
        $project =  Projects::find($id);
        $activity = activities::find($aid);
        return view('activities.activities-edit',compact('title','activity','project'));
    }
    public function activitiesupdate(Request $request,$id){
        $data = $request->except('_token');
        $aid = activities::where('proj_id',$id)->value('id');
        $activity = activities::find($aid);
        if($request->hasFile('ucover_photo')){
            
            if($activity->cover_photo !== 'noimage.png'){
                Storage::delete('public/cover_photo/'.$activity->cover_photo);
            }
            
            $filenameWithExt = $request->file('ucover_photo')->getClientOriginalName();
            $filename =pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('ucover_photo')->getClientOriginalExtension();
            $fileNameToStore = $filename .'_'.time().'.'.$extension;
            $path = $request->file('ucover_photo')->storeAs('public/cover_photo', $fileNameToStore);
        }
        else{
            $fileNameToStore = $activity->cover_photo;
        }

        $activity->user_id = auth()->user()->id;
        $activity->proj_id = $id;
        $activity->cover_photo = $fileNameToStore;
        $activity->activity_title = $data['title'];
        $activity->description = $data['actdesc'];
        $activity->date_of_activity = $data['date_of_activity'];
        $activity->icon = $data['icon'];
        $activity->save();

        notify()->success('Success','Activity successfully Updated');
        return redirect()->back();
    }
    public function activitiesdelete(Request $request,$id){
        $aid = activities::where('proj_id',$id)->value('id');
        $activity = \App\activities::find($aid);
            
        if($activity->cover_photo !== 'noimage.png'){
            Storage::delete('public/cover_photo/'.$activity->cover_photo);
        }

        $activity->delete();
            
        notify()->success('Deleted','Activity successfully removed');
        return redirect()->back();
    }
    public function addparticipate(Request $request,$id){
        $tdate = Trainings::find($id);
        $check = TrainingsDetails::where('training_id',$id)->where('attendee_id',auth()->user()->id)->value('id');
        $check2 = TrainingsDetails::find($check);

        $att = TrainingsDetails::where('attendee_id',auth()->user()->id)->value('id');
        $att_check = TrainingsDetails::find($att);
        
        if($check2 !== null){
            flash()->error('Oops!, Request already sent');
            return redirect()->back();
        }else{
            if($att !== null){
                if($tdate->fdate_conducted){
                    if($att_check->training_date == $tdate->fdate_conducted){
                        flash()->error('Oops!, Conflict to another participated event');
                        return redirect()->back();
                    }else{
                        $td = new TrainingsDetails;
                        $td->user_id = Auth::user()->id;
                        $td->attendee_id = Auth::user()->id;
                        $td->training_id = $id;
                        $td->training_date = $tdate->fdate_conducted;
                        $td->status = 1;
                        $td->save();

                        flash()->success('Request Successfully Sent');
                        return redirect()->back();
                    }
                }
            }
            else{
                $td = new TrainingsDetails;
                $td->user_id = Auth::user()->id;
                $td->attendee_id = Auth::user()->id;
                $td->training_id = $id;
                $td->training_date = $tdate->fdate_conducted;
                $td->status = 1;
                $td->save();

                flash()->success('Request Successfully Sent');
                return redirect()->back();
            }
        }
    }
    public function replytocom(Request $request,$id){
        $reply =  new commentdetails;
        $reply->comment_id = $request->input('commid');
        $reply->sender_id = Auth::user()->id;
        $reply->reply = $request->input('reply');
        $reply->save();

        return redirect()->back();
    }
}
