<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Audio;

class AudioController extends Controller
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
            $audio = Audio::
                where('title', 'like', "%$search%")
                ->orderBy('created_at','asc')
                ->paginate(5);

         } else {
            $audio = Audio::orderBy('created_at','asc')->paginate(8);
         }

        return view('audios.index')->with('audio', $audio);
        
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('audios.create');
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
    
            $audio = new Audio;


            $audio->title = $request->title;
            $audio->body = $request->body;
            $audio->featured = $request->featured;
        
    

            $audio->save();
            return redirect()->route('audios.index')
            ->with('success_message', 'New Audio Added Successfully!!'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $audio = Audio::find($id);
        return view('audios.show')->withAudio($audio);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $audio = Audio::find($id);
        return view('audios.edit')->withAudio($audio);
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
    
            $audio = Audio::find($id);


            $audio->title = $request->input('title');
            $audio->body = $request->input('body');
            $audio->featured = $request->input('featured');
        
    

            $audio->save();
            return redirect()->route('audios.index')
            ->with('success_message', 'Audio Updated Successfully!!');  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $audio = Audio::find($id);


        $audio->delete();
        return redirect()->route('audios.index')->with('success_message', 'Audio Deleted');
    }

     public function truncate()
    {

    DB::table('audio')->truncate();
        

        // Session::flash('success', 'Result Deleted Successfully!');
        return redirect()->route('audios.index')
        ->with('success_message', ' All Audios deleted Successfully!!');
    }
}
