@extends('layouts.app')

@section('content')

<div class ="container">

    @if (session()->has('success_message'))
                <div class="alert alert-success">
                    {{ session()->get('success_message') }}
                </div>
            @endif

            @if(count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>


<div class="container" style="background-color: #fff;"><br>
	<div class="row">
	<div class="col-md-2">
	<a href="{{ route('home') }}"><i class="fa fa-fw fa-home"></i>Dashboard</a>
		</div>
	
	<div class="col-md-2">
	<a href="{{ route('posts.create') }}" class="btn btn-primary">Create Post &nbsp;</a>
		</div>

        <div class="col-md-4">
        <form action="{{ route('posts.index') }}" method="GET" class="form-inline" style="padding-left:60px;">
    <input type="text" name="search" id="search" value="{{ request()->input('search') }}"  placeholder="Search for Posts" required>
    <button type="submit" style="padding-right:10px;"><i class="fa fa-search" style="width:30px;"></i></button>
        </form>
        </div>

     <div class="col-md-4">
		<h3 align="right">
		<a href="{{ route('posts.truncate') }}" class="btn btn-sm btn-danger">Delete All Post</a>
		</h3>
	</div>

	</div>
	<hr>
	<br>

          

   

<h3 align="center"> Posts</h3>
<br>

@if(count($post) > 0)

<div class="container" style="background-color: #fff;">
    <div class="row">
        <div class="col-md-12">
<table class="table table-stripped">
    <tr>
    	<th>ID</th>
        <th>Title</th>
        <th>Slug</th>
        <th>Body</th>
        <th>Image</th>
        <th>Featured</th>
        <th>Created At</th>
        <th>Actions</th>
    </tr>

    @foreach($post as $posts)
        <tr>
        	<td>{{$posts->id}}</td>
            <td>{{$posts->title}}</td>
            <td>{{$posts->slug}}</td>
             <td>{!! $posts->body !!}</td>
            <td> <img class="img-fluid" src="{{ asset($posts->image) }}" alt="post image" width="40px" height="40px"> </td>
            <td>{{$posts->featured}}</td>
            <td>{{$posts->created_at->diffForHumans()}}</td>
            <!-- <td><a href="#" class="btn btn-secondary">Edit</a></td> -->
            <td>
            	<a href="{{ route('posts.show', $posts->id)}}" class=" btn btn-info btn-sm"> View </a>
            	<a href="{{ route('posts.edit', $posts->id)}}" class="btn btn-secondary btn-sm" >Edit</
        	</td>
        	
        </tr>
    @endforeach

    <h5 align="center"> {{ $post->links() }} </h5>

</table>
@else
 <p>No Posts found</p>
@endif
                             
                <!-- </div> -->
            <!-- </div> -->
        </div>
    </div>
</div>
@endsection
