<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function upload(Request $request)
    {
    	 $validation = $request->validate([
        'music' => 'required|file|max:10240'
 
    ]);
    	$file = $validation['music']; // get the validated file

    	// $file = $request->file('music');
    	$destination_path = public_path().'/music';
    	$extesion = $file->getClientOriginalExtension();
    	$files = $file->getClientOriginalName();
    	$filename = $files.'_'.time().'.'.$extesion;
    	$file->move($destination_path,$filename);

    	return redirect()->back() ->with('success_message', 'New Video Added Successfully!!');

            
    }
}
