<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use App\User;
use App\Gallery;
use App\GalleryCategory as Gal;
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

        if($request->hasFile('gal_photo')){            
            $filenameWithExt = $request->file('gal_photo')->getClientOriginalName();
            $filename =pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('gal_photo')->getClientOriginalExtension();
            $fileNameToStore = $filename .'_'.time().'.'.$extension;
            $path = $request->file('gal_photo')->storeAs('public/gal_photo', $fileNameToStore);
        }
        else{
            $fileNameToStore = 'noimage.png';
        }

        $category = new Gallery;
        $category->category = $request->input('category');
        $category->gal_photo = $fileNameToStore;
        $category->desc = $request->input('desc');
        $category->save();

        notify()->success('Success', 'Category '.$request->input('category').' successfully added');
        return redirect()->back();   
    }
    public function show($id){
        $title="Photos";
        $categories = DB::table('galleries')->get();
        $photos = Gal::all();
        $gid = $id;
        $category =  Gallery::findorfail($id);
        return view('admin.photos.index',compact('title','categories','gid'))->with(['category'=>$category,'photos'=>$photos]);
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
            $fileNameToStore = 'noimage.png';
        }
        
        $post = new Gal;
        $post->name = $request->input('name');
        $post->description = $request->input('description');
        $post->cat_id = $request->input('cat_id');
        $post->image = $fileNameToStore;
        $post->save();

        return redirect()->back();
    }
    public function remove($id){
        $gid =  Gal::where('cat_id',$id)->value('id');
        $rem =  Gal::find($gid);

        if($rem->image !== 'noimage.png'){
            Storage::delete('public/cover_images/'.$rem->image);
        }
        $rem->delete();

        notify()->success('Success', 'Deleted Successfully');
        return redirect()->back();
    }

    public function view(){
        $title = "Gallery";
        $galleries = Gallery::all();
        $galleries = Gallery::paginate(6);
        return view('website.gallery.albums',compact('title','galleries'));
    }
    public function viewGallery($id){
        $title = "View Gallery";
        $category = Gallery::find($id);
        $galler = Gal::all()->where('cat_id','=',$id);
        $galler = Gal::where('cat_id','=',$id)->paginate(6);

        // var_dump($galler);

        return view('website.gallery.album_show',compact('galler','title','category'));
    }
}
