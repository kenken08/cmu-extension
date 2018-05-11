<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use App\User;
use App\Gallery;
use App\GalleryCategory;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    public function index(){
        $title="Gallery";
        $categories = DB::table('galleries')->get();
        return view('admin.photos.albums.index',compact('categories'))->with('title',$title);
    }
    public function store(Request $request){
        $category = new Gallery;
        $category->category = $request->input('category');
        $category->desc = $request->input('desc');
        $category->save();

        notify()->success('Success', 'Category '.$request->input('category').' successfully added');
        return redirect()->back();   
    }
    public function show($id){
        $title="Photos";
        $categories = DB::table('galleries')->get();
        $photos = Gallerycategory::all();
        $category =  Gallery::findorfail($id);
        return view('admin.photos.index',compact('title','categories'))->with(['category'=>$category,'photos'=>$photos]);
    }
    public function savephoto(Request $request){
        $this->validate($request,[
            'name' => 'required',
            'description' => 'required',
            'image' => 'image|nullable|max:1999',
        ]);

        //Handle File upload
        if($request->hasFile('image')){
            //Get filename with the extension
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            //get filename
            $filename =pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //get extension
            $extension = $request->file('image')->getClientOriginalExtension();
            //filename to store
            $fileNameToStore = $filename .'_'.time().'.'.$extension;
            //Upload Image
            $path = $request->file('image')->storeAs('public/cover_images', $fileNameToStore);
        }
        else{
            $fileNameToStore = 'noimage.jpeg';
        }
        
        $post = new GalleryCategory;
        $post->name = $request->input('name');
        $post->description = $request->input('description');
        $post->cat_id = $request->input('cat_id');
        $post->image = $fileNameToStore;
        $post->save();

        return redirect()->back();
    }

    public function view(){
        $title = "Gallery";
        $galleries = Gallery::all();
        $galleries = Gallery::paginate(6);
        return view('website.gallery.albums',compact('title','galleries'));
    }

}
