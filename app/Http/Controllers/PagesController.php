<?php

namespace App\Http\Controllers;

use DB;
use App\User;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){
        return view('pages.index');
    }
    public function about(){
        $title = 'About Us';
        $about = DB::table('abouts')->orderBy('id', "DESC")->take(1)->get();
        return view('pages.about', compact('about'))->with('title', $title);
    }
    public function services(){
        $data = array(
            'title' => 'Services',
            'services' => ['Projects', 'Trainings']
        );
        return view('pages.services')->with($data);
    }
    public function register(){
        return $this->view('auth.register');
    }
    public function contact(){
        $title = 'Contact Us';
        return view('website.contact')->with('title', $title);
    }
}
