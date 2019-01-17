<?php

namespace App\Http\Controllers;

use DB;
use App\Trainings;
use App\User;
use App\RequestTrainings;
use App\RequestTrainingsDetails;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class RequestTrainingsController extends Controller
{
    public function request(Request $request){
        $requests = Input::get('requests');

        if($requests == 0){
            flash()->error('Check atleast one Training');
            return redirect()->back();
        }else{

            $use = new RequestTrainings;
            $use->user_id = auth()->user()->id;
            $use->save();

            $req_id = RequestTrainings::orderBy('id', 'DESC')->limit(1)->value('id');

            foreach($requests as $req){
                $new = new RequestTrainingsDetails;
                $new->req_id = $req_id;
                $new->training_id = $req;
                $new->status = "Pending";
                $new->save(); 
            }
            flash()->success('Your request has been saved successfully');
            return redirect()->back();
        }
    }
    public function showrequest(){
        $title = "Requests";
        $requests = DB::table('request_trainings')->get();
        $users = User::all();
        return view('Units.Requests.requests', compact('title','requests','users'));
    }
    public function showrequested($id){
        $title="Requested Trainings";
        $uid = RequestTrainings::find($id);
        $user = User::all()->where('id','=',$uid->user_id);
        $requests = RequestTrainingsDetails::all()->where('req_id','=',$id);
        $trainings = Trainings::all();
        return view('Units.Requests.requestshow',compact('title','requests','trainings','user'));
    }
    public function updateStatus(Request $request){
        $data = $request->except('_token');
        $ite = count($data['requestact']);
        for($i=0;$i<$ite;$i++){
            $update = RequestTrainingsDetails::find($data['statid'][$i]);
            $update->status = $data['requestact'][$i];
            $update->approved_by = auth()->user()->id;
            $update->save();
        }
        notify()->success('Success', 'Requested Trainings successfully updated');
        return redirect()->back();
    }
    public function setDate(Request $request){
        $find = RequestTrainingsDetails::find($request->input('dateid'));
        $find->fdate =  $request->input('setfDate');
        $find->tdate =  $request->input('settDate');
        $find->save();

        notify()->success('Success', 'Date successfully set');
        return redirect()->back();
    }
}
