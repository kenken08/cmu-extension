<?php

namespace App\Http\Controllers;

use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use Illuminate\Notifications\Notification;
use App\User;
use Auth;
use DB;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "Profile";
        return view('admin.profile')->with('title'. $title);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $title = "Profile";
        return view('website.account.account',compact('title'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title = "Edit Profile";
        return view('admin.profile')->with('title', $title);
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
        $this->validate($request,[
            'firstname' => 'required',
            'lastname' => 'required',
            'born_at' => 'required|date',
            'profile_image' => 'image|nullable|max:1999',
            'password' => 'confirmed',
        ]);
        if($request->hasFile('profile_image')){
            //Get filename with the extension
            $filenameWithExt = $request->file('profile_image')->getClientOriginalName();
            //get filename
            $filename =pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //get extension
            $extension = $request->file('profile_image')->getClientOriginalExtension();
            //filename to store
            $fileNameToStore = $filename .'_'.time().'.'.$extension;
            //Upload Image
            $path = $request->file('profile_image')->storeAs('public/profile_images', $fileNameToStore);
        }
        else{
            $fileNameToStore = '';
        }

            if(auth()->user()->admin=='1'){$title="Admin";}
            elseif(auth()->user()->admin=='2'){$title="Unit";}
            $user = User::findOrFail($id);
            
            if(auth()->user()->profile_image !== null){
                
                $user->firstname = $request->input('firstname');
                $user->lastname = $request->input('lastname');
                $user->email = $request->input('email');
                if ($request->input('password') !== null) {
                    $user->password = Hash::make(Input::get('password'));
                }
                if($request->hasFile('profile_image')){
                    $user->profile_image = $fileNameToStore;
                    notify()->success('Success', 'Profile updated sucessfully');
                }
                else{notify()->success('Success', 'Profile updated sucessfully no File Uploaded');}
                $user->born_at = $request->input('born_at');
                $user->contactno = $request->input('contactno');
                $user->save();
                
                if(Auth::user()->admin == 0){
                    return redirect('/account-profile');
                }
                else{
                    return redirect('/home');
                }
            }
            else{

                $user->firstname = $request->input('firstname');
                $user->lastname = $request->input('lastname');
                $user->email = $request->input('email');
                if ($request->input('password') !== null) {
                    $user->password = Hash::make(Input::get('password'));
                }
                $user->profile_image = $fileNameToStore;
                $user->born_at = $request->input('born_at');
                $user->contactno = $request->input('contactno');
                $user->save();
                notify()->success('Success', 'Profile updated sucessfully');
                
                if(Auth::user()->admin == 0){
                    return redirect('/account-profile');
                }
                else{
                    return redirect('/home');
                }
            }
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
