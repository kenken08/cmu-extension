<?php

namespace App\Http\Controllers;

use Auth;
use Carbon\Carbon;
use App\Requests;
use App\announcements;
use App\Requestdetails;
use Illuminate\Http\Request;
use App\commentdetails;

class MessageController extends Controller
{
    public function send(Request $request){
        // $this->validate($request,[
        //     'message' => 'required',
        // ]);

        $time = time();
        if($request->input('message') == null){
            flash()->error('Message field is required');
            return redirect()->back();
        }
        else{
            $check = auth()->user()->id;
            $chec = Requests::where('user_id',$check)->value('id');

            if($chec == null){
                $message =  new Requests;
                $message->user_id = Auth::user()->id;
                $message->date = Carbon::today()->toDateString();
                $message->save();


                $requestid = Requests::orderBy('created_at','DESC')->take(1)->value('id');
                
                $mess = new Requestdetails;
                $mess->requestid = $requestid;
                $mess->repliedbyid = Auth::user()->id;
                $mess->message = $request->input('message');
                $mess->datetime = Carbon::now();
                $mess->status = 0;
                $mess->save();

                flash()->success('Your Message has been sent successfully');
                return redirect()->back();
            }elseif($chec != null){

                $mess = new Requestdetails;
                $mess->requestid = $chec;
                $mess->repliedbyid = Auth::user()->id;
                $mess->message = $request->input('message');
                $mess->datetime = Carbon::now();
                $mess->status = 0;
                $mess->save();

                flash()->success('Your Message has been sent successfully');
                return redirect()->back();
            }
        }
    }
    public function messages(){
        $title ="Messages";
        $messages = Requests::orderBy('date','DESC')->get();
        return view('Units.Messages.messages',compact('title','messages'));
    }
    public function reply(Request $request){
        $id = $request->input('reqid');
        $rd = Requestdetails::where('requestid',$id)->value('id');

        $saverd = new Requestdetails;
        $saverd->requestid = $request->input('reqid');
        $saverd->repliedbyid = auth()->user()->id;
        $saverd->message = $request->input('reply');
        $saverd->datetime = Carbon::now();
        $saverd->status = 1;
        $saverd->save();
        // var_dump($id);
        $messages = Requests::orderBy('date','DESC')->get();
        $rd = Requestdetails::join('requests','requestdetails.requestid','=','requests.id')->join('users','users.id','=','requestdetails.repliedbyid')
                ->where('requests.id',$rd)->orderBy('datetime','DESC')->get();
        return redirect('/home/messages')->with('messages',$messages,'rd',$rd);
    }
    public function getreplies(Request $request){
        $title = "Messages";
        $getid = $request->input('req');
        $rid = Requests::where('id',$getid)->value('id');
        
        $rdc = Requestdetails::where('requestid',$rid)->where('status',0)->get();
        
        foreach($rdc as $c){
            $rdu = Requestdetails::find($c->id);
            $rdu->status = 1;
            $rdu->save();
        }

        $messages = Requests::orderBy('date','DESC')->get();

        $rds = Requestdetails::all();
        $rd = Requestdetails::join('requests','requestdetails.requestid','=','requests.id')->join('users','users.id','=','requestdetails.repliedbyid')
                ->where('requests.id',$rid)->orderBy('datetime','DESC')->get();

        // var_dump($rid);
        return view('Units.Messages.messages',compact('title','rd','rrid','messages','rid'));
    }
    public function announcements(){
        $title = "Announcements";
        $announcements = announcements::orderBy('starts_at','DESC')->get();
        return view('announcements.announcements-index',compact('title','announcements')); 
    }
    public function announcementsadd(Request $request){
        $data = $request->except('_token');

        if($request->hasFile('ann_photo')){            
            $filenameWithExt = $request->file('ann_photo')->getClientOriginalName();
            $filename =pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('ann_photo')->getClientOriginalExtension();
            $fileNameToStore = $filename .'_'.time().'.'.$extension;
            $path = $request->file('ann_photo')->storeAs('public/ann_photo', $fileNameToStore);
        }
        else{
            $fileNameToStore = 'noimage.png';
        }

        $ann = new announcements;
        $ann->user_id = auth()->user()->id;
        $ann->announcement_title = $data['atitle'];
        $ann->description = $data['adesc'];
        $ann->ann_photo =  $fileNameToStore;
        $ann->starts_at = $data['starts_at'];
        $ann->expires_at = $data['expires_at'];
        $ann->save();

        flash()->success('Success, Posted Successfully');
        return redirect()->back();
    }
    public function announcementsdelete($id){
        $ann = announcements::find($id);

        if($ann->ann_photo !== 'noimage.png'){
            Storage::delete('public/ann_photo/'.$ann->ann_photo);
        }

        $ann->delete();

        flash()->success('Success, Deleted Successfully');
        return redirect()->back();
    }
}
