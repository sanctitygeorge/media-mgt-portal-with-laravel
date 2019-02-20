<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Storage;
use App\Post;

class PostController extends Controller
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
            $post = Post::
                where('title', 'like', "%$search%")
                ->orderBy('created_at','desc')
                ->paginate(5);

         } else {
            $post = Post::orderBy('created_at','asc')->paginate(10);
         }

        return view('posts.index')->with('post', $post);
        
        // $post = Post::paginate(10);
        // return view('posts.index')->withPost($post);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
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
            'slug' => 'required|string',
            'body' => 'required|string',
            'featured' => 'required|boolean',
            'image' => 'required',
             ));
    
            $posts = new Post;

            $path = Storage::putFile('public', $request->file('image'));
            $url = Storage::url($path);

            $posts->title = $request->title;
            $posts->slug = $request->slug;
            $posts->body = $request->body;
            $posts->image = $url;
            $posts->featured = $request->featured;
        
    

            $posts->save();
            return redirect()->route('posts.index')
            ->with('success_message', 'New Post Added Successfully!!');   
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $post = Post::find($id);
        return view('posts.show')->withPost($post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $posts = Post::find($id);


        return view('posts.edit')->withPosts($posts);
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
            'slug' => 'required|string|max:255|unique:posts',
            'body' => 'required|string',
            'featured' => 'required|boolean',
             ));
    
            $posts = Post::find($id);

            $path = Storage::putFile('public', $request->file('image'));
            $url = Storage::url($path);

            $posts->title = $request->input('title');
            $posts->slug = $request->input('slug');
            $posts->body = $request->input('body');
            $posts->image = $url;
            $posts->featured = $request->input('featured');
        
    

            $posts->save();
            return redirect()->route('posts.index')
            ->with('success_message', 'Post Updated Successfully!!');   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);


        $post->delete();
        return redirect()->route('posts.index')->with('success_message', 'Post Deleted');
    }

    public function truncate()
    {
       DB::table('posts')->truncate();
        

        // Session::flash('success', 'Result Deleted Successfully!');
        return redirect()->route('posts.index')
        ->with('success_message', ' All Posts deleted Successfully!!');
    }
}
