<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Video;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $search = $request->input('search');

       
        if ($search) {
            $video = Video::
                where('title', 'like', "%$search%")
                ->orderBy('created_at','asc')
                ->paginate(5);

         } else {
            $video = Video::orderBy('created_at','desc')->paginate(10);
         }

        return view('videos.index')->with('video', $video);
        
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('videos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, array(
            'title' => 'required|string',
            'body' => 'required|string',
            'featured' => 'required|boolean',
             ));
    
            $video = new Video;


            $video->title = $request->title;
            $video->body = $request->body;
            $video->featured = $request->featured;
        
    

            $video->save();
            return redirect()->route('videos.index')
            ->with('success_message', 'New Video Added Successfully!!'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $video = Video::find($id);
        return view('videos.show')->withVideo($video);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $video = Video::find($id);
        return view('videos.edit')->withVideo($video);
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
        $this->validate($request, array(
            'title' => 'required|string',
            'body' => 'required|string',
            'featured' => 'required|boolean',
             ));
    
            $video = Video::find($id);


            $video->title = $request->input('title');
            $video->body = $request->input('body');
            $video->featured = $request->input('featured');
        
    

            $video->save();
            return redirect()->route('videos.index')
            ->with('success_message', 'Video Updated Successfully!!');  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $video = Video::find($id);


        $video->delete();
        return redirect()->route('videos.index')->with('success_message', 'Video Deleted');
    }

     public function truncate()
    {

    DB::table('videos')->truncate();
        

        // Session::flash('success', 'Result Deleted Successfully!');
        return redirect()->route('videos.index')
        ->with('success_message', ' All Videos deleted Successfully!!');
    }
}
