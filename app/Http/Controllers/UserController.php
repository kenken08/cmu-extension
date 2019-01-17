<?php

namespace App\Http\Controllers;

use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use Illuminate\Notifications\Notification;
use App\User;
use DB;
use Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(auth()->user()->admin == '1'){
            $users = DB::table('users')->get();
            $title = "Users";

            return view('admin.clients.index', ['users' => $users])->with('title', $title);
        }
            return redirect('/')->with('error', 'Unauthorized access of page');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
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
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'born_at' => 'required|date',
        ]);

            $title = "Register";
            $user = new User;
            $user->firstname = $request->input('firstname');
            $user->lastname = $request->input('lastname');
            $user->email = $request->input('email');
            $user->born_at = $request->input('born_at');
            $user->password = Hash::make(Input::get('password'));
            $user->created_at = time();
            $user->profile_image = 'noimage.png';
            $user->admin = '0';
            $user->status = "pending";
            $user->save();

            // alert()->success('Thank you,','your account has been created, please check your inbox for further instructions.');
            flash()->success('Registered Successfully');
            return redirect('/login');
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
        $title = "Edit User";
        $user = User::findOrFail($id);
        
        return view('admin.clients.edit',compact('title'))->with('user', $user);
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
            'contactno' => 'nullable|max:20',
            'password' => 'confirmed',
        ]);
        if($request->hasFile('profile_image')){            
            $filenameWithExt = $request->file('profile_image')->getClientOriginalName();
            $filename =pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('profile_image')->getClientOriginalExtension();
            $fileNameToStore = $filename .'_'.time().'.'.$extension;
            $path = $request->file('profile_image')->storeAs('public/profile_images', $fileNameToStore);
        }
        else{
            $fileNameToStore = '';
        }

            $title = "Edit User";
            $user = User::findOrFail($id);

            if($user->profile_image !== null){
                $user->firstname = $request->input('firstname');
                $user->lastname = $request->input('lastname');
                $user->email = $request->input('email');
                if ($request->input('password') > 6) {
                    $user->password = Hash::make(Input::get('password'));
                }
                $user->born_at = $request->input('born_at');
                $user->admin = $request->input('role');
                $user->save();
                notify()->success('Success', 'Profile updated sucessfully and no file uploaded');
                return redirect()->back()->with('title', $title);
            }
            else{
                $user->firstname = $request->input('firstname');
                $user->lastname = $request->input('lastname');
                $user->email = $request->input('email');
                if ($request->input('password') > 6) {
                    $user->password = Hash::make(Input::get('password'));
                }
                $user->profile_image = $fileNameToStore;
                $user->born_at = $request->input('born_at');
                $user->admin = $request->input('role');
                $user->save();
                notify()->success('Success', 'Profile updated sucessfully');
                return redirect()->back()->with('title', $title);
            }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        $user = User::find(Input::get('uid'));
        if($user->profile_image !== 'noimage.png'){
            Storage::delete('public/profile_images/'.$user->profile_image);
        }
        $user->Delete();

        notify()->success('Success', 'User Deleted successfully');
        return redirect('/users');
    }

    public function confirmation($id){
        $user = User::find($id);
        $user->status = 'approved';
        $user->save();

        notify()->success('Success','User Registration Successfully Confirmed');
        return redirect()->back();
    }
}