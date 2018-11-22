<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){
        $title = 'Welcome to UpCrate!';
        // return view('pages.index', compact('title'));
        return view('pages.index')->with('title', $title);
    }

    public function about(){
        $title = 'About UpCrate!';
        return view('pages.about')->with('title', $title);
    }

    public function services(){
        $data = array(
            'title' => 'Services',
            'services' => ['Web Design', 'Programming', 'SEO']
        );
        return view('pages.services')->with($data);
    }

    public function proposal(){
        return view('pages.proposal');
    }

    public function signin(){
        return view('pages.signin');
    }

    public function loading(){
        return view('pages.loading');   
    }

    public function landing(){
        
        if (!\Auth::check()){
            return view('welcome');
        }

        return view('navbar');
    }
}
