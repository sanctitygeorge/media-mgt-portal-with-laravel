<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Video;
use App\Audio;
use App\Post;

class LandingPageController extends Controller
{
    public function index()
    {
            $video = Video::
            where('featured', '=', 1)
             ->orderBy('created_at','asc')
             ->paginate(6);

             $audio = Audio::
            where('featured', '=', 1)
             ->orderBy('created_at','asc')
             ->paginate(6);

            $post = Post::
            where('featured', '=', 1)
             ->orderBy('created_at','asc')
             ->paginate(6);
        
    	return view('landing-page')
    	->with('video', $video)
    	->with('audio', $audio)
    	->with('post', $post);
    }

}
