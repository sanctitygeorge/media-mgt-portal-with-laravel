<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Post;
use App\Video;
use App\Audio;
use App\Feedback;

class PageController extends Controller
{
    
    public function post()
    {
        
        $post = Post::orderBy('created_at','asc')->paginate(6);
         

        return view('pages.posts')->with('post', $post);
    }

    public function video()
    {
        
        $video = Video::orderBy('created_at','asc')->paginate(6);
         

        return view('pages.videos')->with('video', $video);
    }

     public function audio()
    {
        
        $audio = Audio::orderBy('created_at','asc')->paginate(6);
         

        return view('pages.audios')->with('audio', $audio);
    }

     public function team()
    {
        
        $team = Team::all();
         

        return view('pages.our-team')->with('team', $team);
    }

    

     public function about()
    {
        
        // $post = Video::orderBy('created_at','asc')->paginate(6);
         

        return view('pages.about-us');
    }

    public function contact()
    {
        return view('pages.contact-us');
    }



}
