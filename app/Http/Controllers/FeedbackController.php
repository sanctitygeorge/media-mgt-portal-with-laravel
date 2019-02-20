<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Feedback;


class FeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function contact()
    {
        return view('feedbacks.contact-us');
    }

    public function index()
    {
        $feedback = Feedback::paginate(15);
        return view('feedbacks.index')->withFeedback($feedback);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('feedbacks.create');
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
            'name' => 'required|string|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
             ));
    
            $feedback = new Feedback;
            $feedback->name = $request->name;
            $feedback->subject  = $request->subject;
            $feedback->message  = $request->message;
            $feedback->phone  = $request->phone;
            $feedback->email  = $request->email;
           
            $feedback->save();
    
      return redirect()->route('contact-us')->with('success_message', 'Dearest, your message has being received!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $feedback = Feedback::find($id);
        return view('feedbacks.show')->withFeedback($feedback);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $feedback = Feedback::find($id);


        return view('feedbacks.edit')->withFeedback($feedback);
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
            'name' => 'required|string|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
             ));
    
            $feedback = Feedback::find($id);
            $feedback->name = $request->input('name');
            $feedback->subject  = $request->input('subject');
            $feedback->message  = $request->input('message');
            $feedback->phone  = $request->input('phone');
            $feedback->email  = $request->input('email');
           
            $feedback->save();
    
      return redirect()->route('feedbacks.index')->with('success_message', 'Feedback Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $feedback = Feedback::find($id);


        $feedback->delete();
        return redirect()->route('feedbacks.index')->with('success_message', 'Feedback Deleted');
    }

    public function truncate()
    {
       DB::table('feedbacks')->truncate();
        

        // Session::flash('success', 'Result Deleted Successfully!');
        return redirect()->route('feedbacks.index')
        ->with('success_message', ' All feedbacks deleted successfully!!');
    }
}
