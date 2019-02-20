<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Storage;
use App\Team;

class TeamController extends Controller
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
            $team = Team::
                where('name', 'like', "%$search%")
                ->orderBy('created_at','desc')
                ->paginate(5);

         } else {
            $team = Team::orderBy('created_at','asc')->paginate(5);
         }

        return view('teams.index')->with('team', $team);
        
        // $team = Team::paginate(10);
        // return view('teams.index')->withteam($team);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('teams.create');
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
            'name' => 'required|string',
            'phone' => 'required|string',
            'biography' => 'required|string',
             ));
    
            $teams = new Team;

            $path = Storage::putFile('public', $request->file('image'));
            $url = Storage::url($path);

            $teams->name = $request->name;
            $teams->phone = $request->phone;
            $teams->biography = $request->biography;
            $teams->image = $url;
            

            $teams->save();
            return redirect()->route('teams.index')
            ->with('success_message', 'New Team Member Added Successfully!!');   
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $team = Team::find($id);
        return view('teams.show')->withTeam($team);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $teams = Team::find($id);


        return view('teams.edit')->withTeams($teams);
    }

    /**
     * Update the specified resource in storage.
     *
     * @paramnameIlluminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, array(
            'name' => 'required|string',
            'phone' => 'required|string',
            'biography' => 'required|string',
             ));
    
            $teams = Team::find($id);

            $path = Storage::putFile('public', $request->file('image'));
            $url = Storage::url($path);

            $teams->name = $request->input('name');
            $teams->phone = $request->input('phone');
            $teams->biography = $request->input('biography');
            $teams->image = $url;
    
    
            $teams->save();
            return redirect()->route('teams.index')
            ->with('success_message', 'Profile Updated Successfully!!');   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $team = Team::find($id);


        $team->delete();
        return redirect()->route('teams.index')->with('success_message', 'Team Member Deleted');
    }

    public function truncate()
    {
       DB::table('teams')->truncate();
        

        // Session::flash('success', 'Result Deleted Successfully!');
        return redirect()->route('teams.index')
        ->with('success_message', ' All Teams Members deleted Successfully!!');
    }
}
